<?php
$query = "

select itticket.id, itticket.type, itticket.brief, itticket.createdon, itticket.status,
itsupportservices.severity, itsupportservices.response, itsupportservices.recovery
from itticket
left join itsupportservices
on itticket.severity=itsupportservices.id
order by itticket.createdon DESC;
";
$statement = $conn->prepare($query);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$result = $statement->fetchAll();
?>



date_default_timezone_set('Europe/London');
$datetimenow = date('m/d/y h:i a', time());

