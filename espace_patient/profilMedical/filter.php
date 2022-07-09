 <?php
include '../../connexionDoc/cnx.php';
// include'pagination.php';
//================function to select which date filter we want ==============

function filter_by_date($table,$date,$start,$nb,$field,$search,$conn)
{
    if($date==='cemois')
    {
        $cemois=$date;
        $query = mysqli_query($conn , "SELECT * from $table where `date` BETWEEN DATE_FORMAT(CURDATE() ,'%Y-%m-01') AND CURDATE() GROUP BY YEAR(date),MONTH(date) AND $field  LIKE'%$search%' limit $start,$nb");
      
    }
    if($date==='moisprec')
    {
        $moisprec=$date;
        $query = mysqli_query($conn , "SELECT * from $table where MONTH( date ) = MONTH( DATE_SUB(CURDATE(),INTERVAL 1 MONTH )) AND YEAR(date) = YEAR( DATE_SUB(CURDATE( ),INTERVAL 1 MONTH ))AND $field  LIKE'%$search%' limit $start,$nb");
    }
    if($date==='6mois')
    {
        $six_mois=$date;
        $query = mysqli_query($conn , "SELECT * from $table  where date > now() - INTERVAL 6 month AND $field  LIKE'%$search%' limit $start,$nb;");
    }
    if($date==='ans')
    {
        $ans=$date;
        $query = mysqli_query($conn , "SELECT * from $table  where date > now() - INTERVAL 12 month AND $field  LIKE'%$search%' limit $start,$nb;");
    }
    if($date==='plusieursAns')
    {
        $plusAn=$date;
        $query = mysqli_query($conn , "SELECT * from $table where `date`  BETWEEN DATE_SUB(CURDATE(), INTERVAL 5 YEAR)  AND CURDATE()GROUP BY YEAR(date),MONTH(date)  AND $field  LIKE'%$search%' limit $start,$nb;");
    }
    if($date==='tous')
    {
        $query = mysqli_query($conn,"SELECT * FROM $table WHERE  $field  LIKE'%$search%' limit $start,$nb");
    }
  
    return $query;
}
//  if(isset($date))

//  {
//     function
                        
//   }
//  if(isset($_GET['search']))
//   {
//     $search=$_GET['search'];
//     $search_res = mysqli_query($conn , "SELECT * from $table where $field LIKE'%$search%';");
     
//  }

                    