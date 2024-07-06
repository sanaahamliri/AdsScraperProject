<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\ads;
use App\Models\images;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // app/Http/Controllers/MainController.php

    public function scrapeAds()
    {
        $output = [];
        $return_var = 0;

        // Execute the Node.js script
        exec('node scripts/scrape.js 2>&1', $output, $return_var);

        // Display debugging results
        foreach ($output as $line) {
            echo $line . "<br>";
        }

        // Décoder la sortie JSON en un tableau PHP
        $json_output = implode("", $output);

        $adsList = json_decode($json_output, true);



        // Insert the ads into the database
        foreach ($adsList as $item) {
            try {
                $ad = ads::create([
                    'imageUrl' => $item['imageUrl'],
                    'title' => $item['title'],
                    'price' => $item['price'],
                    'location' => $item['location'],
                    'rooms' => $item['rooms'],
                    'size' => $item['size'],
                    'type' => $item['type'],
                    'endDate' => $item['endDate'],
                    'description' => $item['description'],
                    'conditions' => $item['conditions'],
                    'features' => $item['features'],
                    'prices' => $item['prices'],
                    'rules' => $item['rules'],
                ]);

                foreach ($item['images'] as $imageUrl) {
                    images::create([
                        'ad_id' => $ad->id,
                        'url' => $imageUrl,
                    ]);
                }

            } catch (\Exception $e) {
                // Log or handle the error as needed
                echo 'Error inserting ad: ' . $e->getMessage() . "<br>";
            }
        }


        return response()->json(['message' => 'Ads inserted successfully']);
    }



    public function showAd($id)
    {
        $ad = ads::find($id);

        if (!$ad) {
            return redirect()->back()->with('error', 'Ad not found');
        }

        return view('Ads.ad_details', ['ad' => $ad]);
    }
}
