<?php
if(isset($_GET["page"]))
{
    $page=$_GET["page"];
}
else
{
    $page=1;
}
$num_per_page=03;

$start_from=($page-1)*$num_per_page;

function pagination($conn,$table,$pageName,$num_per_page,$page)
{
$sql="SELECT * FROM $table";
$rs_result=mysqli_query($conn,$sql);
$total_records=mysqli_num_rows($rs_result);
$total_pages=ceil($total_records/$num_per_page);
if($page>1)
{
    echo "<a class='pagination'href='".$pageName."?page=".($page-1)."'>Précédent</a>" ;

}
for($i=1;$i<=$total_pages;$i++)
{
    echo "<a class='pagination'href='".$pageName."?page=".$i."'>".$i."</a>" ;
}
if($page<$i)
{
    echo "<a class='pagination'href='".$pageName."?page=".($page+1)."'>Suivant</a>" ;

}
}
function pagination_sections($conn,$table,$pageName,$num_per_page,$page,$section)
{
$sql="SELECT * FROM $table";
$rs_result=mysqli_query($conn,$sql);
$total_records=mysqli_num_rows($rs_result);
$total_pages=ceil($total_records/$num_per_page);
if($page>1)
{
    echo "<a class='pagination'href='".$pageName."?page=".($page-1).$section."'>Précédent</a>" ;

}
for($i=1;$i<=$total_pages;$i++)
{
    echo "<a class='pagination'href='".$pageName."?page=".$i.$section."'>".$i."</a>" ;
}
if($page<$i)
{
    echo "<a class='pagination'href='".$pageName."?page=".($page+1).$section."'>Suivant</a>" ;

}
}