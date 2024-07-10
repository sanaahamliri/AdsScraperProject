<?php
namespace App\Http\Controllers;

use App\Models\ads;
use App\Models\images;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function scrapeAds()
    {
        $output = [];
        $return_var = 0;

        exec('node scripts/scrape.js 2>&1', $output, $return_var);

        foreach ($output as $line) {
            echo $line . "<br>";
        }

        $json_output = implode("", $output);
        $adsList = json_decode($json_output, true);

        $existingAds = ads::pluck('href')->toArray();

        $newHrefs = array_column($adsList, 'href');

        $adsToDelete = array_diff($existingAds, $newHrefs);

        ads::whereIn('href', $adsToDelete)->delete();

        foreach ($adsList as $item) {
            try {
                $ad = ads::updateOrCreate(
                    ['href' => $item['href']],
                    [
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
                    ]
                );

                images::where('ads_id', $ad->id)->delete();

               
                foreach ($item['Images'] as $imageUrl) {
                    images::create([
                        'ads_id' => $ad->id,
                        'url' => $imageUrl,
                    ]);
                }
            } catch (\Exception $e) {
                
                echo 'Error inserting ad: ' . $e->getMessage() . "<br>";
            }
        }

        return response()->json(['message' => 'Ads inserted successfully']);
    }

    public function showAd($id)
    {
        $ad = ads::with('images')->find($id);

        if (!$ad) {
            return redirect()->back()->with('error', 'Ad not found');
        }

        return view('Ads.ad_details', ['ad' => $ad]);
    }
}