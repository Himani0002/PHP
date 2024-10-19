<?php
include 'getConnection.php';

$conn = OpenCon();

echo "Connected Successfully";

CloseCon($conn);
