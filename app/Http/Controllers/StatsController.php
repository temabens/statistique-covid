<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class StatsController extends Controller
{
  /*afficher les statistiques sur la carte*/
  public function affData (Request $request)
    {
      $values = StatsController::getStatsData( $request);
      // appeler la vue "carte" en envoyant la var values qui contient tt les stats de chque wilaya
      return view('carte', compact('values'));
    }
  /*importer les statistique depuis le fichier JSON*/
  protected static function getStatsData(Request $request)
    {
      StatsController::StorStatsData($request);
        $data = Storage::get('json/stats_data.json');

        return collect(json_decode($data, true));
    }
    /*stocker les statistiques dans un fichier JSON pour qu'on puisse les utiliser ultérieurement*/
  public static function StorStatsData(Request $request)
  { /*la req utilisée : */
    // SELECT distinct stats.cas_tot, stats.deces_tot,wilaya.ordre FROM `stats`,wilaya WHERE stats.wilaya=wilaya.code and stats.date=CURDATE() ORDER by wilaya.ordre ASC ->orderBy('name', 'desc')
  $rq = DB::table('stats')        ->join('willayas', 'willayas.code', '=', 'stats.wilaya')        ->select('cas_tot','deces_tot','gueris_tot','en_cours_soin','gueris_24h','deces_24h','date')       ->orderBy('willayas.ordre', 'asc') ->get();
/*les résultats seront stockés dans le tableau $data*/
                  $data = array();
          foreach ($rq as $e) {
              $_E = (array)$e;
              $data[] = array(
                  'cas'  => $_E['cas_tot'],
                  'deces'  => $_E['deces_tot'],
                  'gueris'  => $_E['gueris_tot'],
                  'soin'  => $_E['en_cours_soin'],
                  'gueris24'  => $_E['gueris_24h'],
                  'deces24'  => $_E['deces_24h'],
                  'date'  => $_E['date']
              );
      }
      /*stockage dans .JSON */
$languagesJSON = json_encode($data);
Storage::put('JSON/stats_data.json', $languagesJSON);
  }

}
