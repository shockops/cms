<?php
    require("fe-header.php");
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Kategorien</h2>
        </div>
    </div>
    <hr class="yellow">
<div class="row">
    <?php
    foreach($legende as $cats => $val)
    {
    ?>
        <div class="col-md-<?php echo (12/count($legende)); ?>"><a href="fe-category?catID=<?php echo $cats; ?>">
               <img src="Upload/Thumbnails/<?php echo $cats ?>.png" alt="" style="width: 100%;">
               <?php /* echo $val; */ ?>
           </a>
        
    </div>
    <?php
    }
    ?>
</div>
<hr class="yellow">
<div class="row">
<div class="col-12">
<br>
    Ein Projekt von Mitarbeitenden des TSBW im Rahmen einer Reha-pädagogischen Fortbildung. Gemeinsam mit Teilnehmenden und Fachdiensten des Theodor-Schäfer-Berufsbildungswerkes wurde ein Fächer entwickelt. Dieser bietet Teilnehmenden, Firmen und Mitarbeitenden Hilfestellung bei der Kommunikation mit Hörgeschädigten. Inhalt des Tools ist die Darstellung von Kommunikationsregeln, internen und externen Ansprechpartnern in einer ansprechenden und handlichen Form. Teil des hörgeschädigten Fächers sind übersetzte Videos in Deutscher Gebärdensprache Kommunikationsregeln in einfacher Sprache, sowie Digitalisierung via QR-Code. Dieser leitet den Nutzer auf eine dauerhaft erreichbare Website weiter, auf der erweiterte Inhalte des Fächers dargestellt werden. Diese Seite ist für mobile Endgeräte optimiert. Die Kombination aus klassischem Printmedium und digitalisierten Medien stellt ein kompaktes und editierbares Infoportal dar. 
</div>
</div>
<?php
    require("fe-footer.php");
?>