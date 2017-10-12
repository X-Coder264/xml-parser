<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Document;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class XMLParseController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('xml_parse');
    }

    /**
     * @param Request $request
     * @return BinaryFileResponse
     */
    public function store(Request $request)
    {
        $categories = Category::all();

        $data = $categories->flatMap(function ($category) {
            return [$category->kategorija => $category->marza];
        })->all();

        /** @var Document $xml */
        $xml = XmlParser::load($request->file('xml'));

        $tecaj = 7.5;
        // defaultna marža
        $marza = 2.0;

        $parsedXML = $xml->parse([
            'articles' => ['uses' => 'Article[ArticleID,Title,SupplierArticleID,BarCode,ClassI,ClassII,ClassIII,ArticleDescription,PictureURL,Length,Width,Height,BruttoVolume,ListPriceWoTax,DiscountPercent,DiscountPercent2,Stock]'],
        ]);

        $filename = "fajl.csv";
        $handle = fopen($filename, 'w+');
        fputcsv(
            $handle,
            [
                'ArticleID', 'Title', 'SupplierArticleID', 'BarCode', 'ClassI', 'ClassII', 'ClassIII', 'ArticleDescription',
                'PictureURL', 'Length', 'Width', 'Height', 'BruttoVolume', 'price', 'DiscountPercent',
                'DiscountPercent2', 'Stock'
            ]
        );

        foreach ($parsedXML['articles'] as &$article) {
            if (isset($data[$article['ClassIII']])) {
                $marza = $data[$article['ClassIII']];
            }
            $article['Price'] = number_format(
                $article['ListPriceWoTax'] * $tecaj * $marza,
                2,
                '.',
                ''
            );
            unset($article['ListPriceWoTax']);

            fputcsv(
                $handle,
                [
                    $article['ArticleID'], $article['Title'], $article['SupplierArticleID'], $article['BarCode'],
                    $article['ClassI'], $article['ClassII'], $article['ClassIII'], $article['ArticleDescription'],
                    $article['PictureURL'], $article['Length'], $article['Width'], $article['Height'],
                    $article['BruttoVolume'], $article['Price'], $article['DiscountPercent'], $article['DiscountPercent2'],
                    $article['Stock']
                ]
            );

            DB::table('articles')->insert($article);
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, 'fajl.csv', $headers)->deleteFileAfterSend(true);
    }
}
