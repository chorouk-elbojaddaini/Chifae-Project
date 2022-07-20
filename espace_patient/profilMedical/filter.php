 <?php
include '../../connexionDoc/cnx.php';
// include'pagination.php';
//================function to select which date filter we want ==============
//=====array to get num of rows and the result of the query=================
$array = array();
function filter_by_date($table,$date,$start,$nb,$field,$search,$conn)
{
    if($date==='cemois')
    {
        $query = mysqli_query($conn , "SELECT * from $table  WHERE MONTH(date) = MONTH(now()) AND YEAR(date) = YEAR(now()) AND $field  LIKE'%$search%' limit $start,$nb");
        $query1 = mysqli_query($conn , "SELECT * from $table  WHERE MONTH(date) = MONTH(now()) AND YEAR(date) = YEAR(now()) AND $field  LIKE'%$search%' ");

      
    }
    if($date==='moisprec')
    {
        $query = mysqli_query($conn , "SELECT * from $table where MONTH( date ) = MONTH( DATE_SUB(CURDATE(),INTERVAL 1 MONTH )) AND YEAR(date) = YEAR( DATE_SUB(CURDATE( ),INTERVAL 1 MONTH ))AND $field  LIKE'%$search%' limit $start,$nb");
        $query1 = mysqli_query($conn , "SELECT * from $table where MONTH( date ) = MONTH( DATE_SUB(CURDATE(),INTERVAL 1 MONTH )) AND YEAR(date) = YEAR( DATE_SUB(CURDATE( ),INTERVAL 1 MONTH ))AND $field  LIKE'%$search%' ");

    }
    if($date==='6mois')
    {
        $query = mysqli_query($conn , "SELECT * from $table   WHERE date <= CURDATE() 
        AND date >= CURDATE() - INTERVAL 6 MONTH AND $field  LIKE'%$search%' limit $start,$nb;");
         $query1 = mysqli_query($conn , "SELECT * from $table   WHERE date <= CURDATE() 
         AND date >= CURDATE() - INTERVAL 6 MONTH AND $field  LIKE'%$search%';");
    }
    if($date==='ans')
    {
        $query = mysqli_query($conn , "SELECT * from $table  WHERE date <= CURDATE() 
        AND date >= CURDATE() - INTERVAL 12 MONTH AND $field  LIKE'%$search%' limit $start,$nb;");
        $query1 = mysqli_query($conn , "SELECT * from $table  WHERE date <= CURDATE() 
        AND date >= CURDATE() - INTERVAL 12 MONTH AND $field  LIKE'%$search%' ");
    }
    if($date==='plusieursAns')
    {
        $query = mysqli_query($conn , "SELECT * from $table where YEAR(date)=YEAR( DATE_SUB(CURDATE(),INTERVAL 5 YEAR ))  AND $field  LIKE'%$search%' limit $start,$nb;");
        $query1 = mysqli_query($conn , "SELECT * from $table where YEAR(date)=YEAR( DATE_SUB(CURDATE(),INTERVAL 5 YEAR ))  AND $field  LIKE'%$search%' ");
    }
    if($date==='tous')
    {
        $query = mysqli_query($conn,"SELECT * FROM $table WHERE  $field  LIKE'%$search%' limit $start,$nb");
        $query1 = mysqli_query($conn,"SELECT * FROM $table WHERE  $field  LIKE'%$search%' ");
    }
  
    return  $array=['query' =>$query, 'nb_rows'=>mysqli_num_rows($query1)];
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

                    