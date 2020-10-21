
<!-- begin Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px
}
</style>
<!-- fin Styles -->
<!-- begin Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/data/countries2.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<!-- fin Resources -->
<!-- begin code de carte -->
<script>
am4core.ready(function() {
  // définition de theme de carte
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// debut de fonctionnement
window.onload = function() {
  //création de la carte
  var chart = am4core.create("chartdiv", am4maps.MapChart);
// importer les IDs, nom, info géographiques de chaque wilaya + les interpréter dans la carte
  chart.geodataSource.url = "https://www.amcharts.com/lib/4/geodata/json/algeriaLow.json";
  chart.geodataSource.events.on("parseended", function(ev) {
    // reçevoire la var values qui contient les stats de chaque wilaya et les stocker dans data[]
    var values = {!! json_encode($values->toArray()) !!};
    var data = [];
    for(var i = 0; i < ev.target.data.features.length; i++) {
      data.push({
        id: ev.target.data.features[i].id,
        value: Math.round( Math.random() * 10000 ),
        cas : values[i]['cas'],
        gueris : values[i]['gueris'],
        deces : values[i]['deces'],
        soin : values[i]['soin'],
        gueris_24 : values[i]['gueris24'],
        deces_24 : values[i]['deces24']
      })
    }
polygonSeries.data = data;
  }
)
// le reste concerne l'animation, couleur, fonctionnement de carte ...
  chart.projection = new am4maps.projections.Mercator();
  var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
  polygonSeries.heatRules.push({
    property: "fill",
    target: polygonSeries.mapPolygons.template,
    min: chart.colors.getIndex(1).brighten(1),
    max: chart.colors.getIndex(1).brighten(-0.3)
  });
  polygonSeries.useGeodata = true;
  let heatLegend = chart.createChild(am4maps.HeatLegend);
  heatLegend.series = polygonSeries;
  heatLegend.align = "right";
  heatLegend.width = am4core.percent(25);
  heatLegend.marginRight = am4core.percent(4);
  heatLegend.minValue = 0;
  heatLegend.maxValue = 40000000;
  heatLegend.valign = "bottom";
  heatLegend.disabled="true";
  heatLegend.valueAxis.renderer.labels.template.adapter.add("text", function(labelText) {
    return "";
  });
// afficher les donnés de values dans la carte tq : "wialya" est le mot désir d'être affiché dans la carte ,{name} est la données désir d'être affichée etc....
// name n'est pas dans data[] mais dans un fichier JSON importer au début
  var polygonTemplate = polygonSeries.mapPolygons.template;
  polygonTemplate.tooltipText = "wialya:{name}\nid:{id}\ncas:{cas}\ngueris:{gueris}\ndeces:{deces}\nsoin:{soin}\ngueris24:{gueris_24}\ndeces24:{deces_24} ";
  polygonTemplate.nonScalingStroke = true;
  polygonTemplate.strokeWidth = 0.5;
  var hs = polygonTemplate.states.create("hover");
  hs.properties.fill = chart.colors.getIndex(1).brighten(-0.5);
};
});
</script>
 <!-- fin code de carte -->
<!--begin HTML -->
<!-- titre -->
<div ><h1>Carte épidémiologique en Algérie, Le 20/10/2020 :</h1> </div>
<!-- div qui affiche la carte et ses données -->
<div id="chartdiv"></div>
<!-- fin html -->
