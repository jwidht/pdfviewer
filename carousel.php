

 <style>
.carousel-inner > .carousel-item > img 
{ 
     max-width:100%;
     height:80vh; 
} 

</style>


<div id="carouselExampleControls" class="carousel slide " data-ride="carousel" data-interval="5000"  >

<!-- indicators -->
<ol class="carousel-indicators">

<?php

$path    = './images';
$files = array_diff(scandir($path), array('.', '..'));

function get_slide_number($mystring)
{
    //$mystring = "slide-5.jpg";
    $start = 1+ strpos($mystring, "-");
    $sub_length =  strpos($mystring, ".") - $start;
    return intval( substr($mystring, $start ,$sub_length ) );
}


function cmp($a, $b)
{ // slide-XX.jpg
    if ($a == $b) {
        return 0;
    }
    return ( get_slide_number($a) < get_slide_number($b) ) ? -1 : 1;
}
usort( $files , "cmp");




$index = 0;
foreach($files as  $file )
{
?>
   <li data-target="#carouselExampleControls" data-slide-to="<?php echo $index; ?>" <?php echo $index==0 ? 'class="active"' : ''; ?> ></li>
<?php
    $index++;
}
?>
</ol>

<div class="carousel-inner ">

<?php
$index = 0;
foreach($files as  $file )
{
    //w-100 image class
?>
    <div class="carousel-item   <?php echo $index==0 ? 'active' : ''; ?>"  >
    <img class="d-block w-100" src="images/<?php echo $file; ?>" alt="<?php echo $file; ?>" >
        <div class="carousel-caption d-none d-md-block transparent" style="right:0%; left:0%">
            <h4><?php echo "Slide ".$index; ?></h4>
        </div>
    </div> 
<?php
 $index++;
}
?>


    <!-- left right controls -->
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>


</div>
</div>
