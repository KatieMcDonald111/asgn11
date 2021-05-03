<?php

function convert_to_gallons($value, $from_unit) {
  switch($from_unit) {
    case 'buckets':
      return $value * 4;
      break;
    case 'butts':
      return $value * 108;
      break;
    case 'hogsheads':
      return $value * 54;
      break;
    case 'gallons':
      return $value;
      break;
    case 'pints':
      return $value * 0.125;
      break;
    case 'firkins':
      return $value * 9;
      break;
    default:
      return "Unsupported unit.";
  }
}

function convert_from_gallons($value, $to_unit) {
  switch($to_unit) {
    case 'buckets':
      return $value / 4;
      break;
    case 'butts':
      return $value / 108;
      break;
    case 'hogsheads':
      return $value / 54;
      break;
    case 'gallons':
      return $value;
      break;
    case 'pints':
      return $value / 0.125;
      break;
    case 'firkins':
      return $value / 9;
      break;
    default:
      return "Unsupported unit.";
  }
}

function convert_volume($value, $from_unit, $to_unit) {
  $gallon_value = convert_to_gallons($value, $from_unit);
  $new_value = convert_from_gallons($gallon_value, $to_unit);
  return $new_value;
}

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if(isset($_POST['submit'])) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];

  $to_value = convert_volume($from_value, $from_unit, $to_unit);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Convert Volume</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div id="main-content">

      <h1>Convert Volume</h1>

      <form action="" method="post">

        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
            <option value="buckets"<?php if($from_unit == 'buckets') { echo " selected"; } ?>>buckets</option>
            <option value="butts"<?php if($from_unit == 'butts') { echo " selected"; } ?>>butts</option>
            <option value="firkins"<?php if($from_unit == 'firkins') { echo " selected"; } ?>>firkins</option>
            <option value="hogsheads"<?php if($from_unit == 'hogsheads') { echo " selected"; } ?>>hogsheads</option>
            <option value="pints"<?php if($from_unit == 'pints') { echo " selected"; } ?>>pints</option>
            <option value="gallons"<?php if($from_unit == 'gallons') { echo " selected"; } ?>>gallons</option>
          </select>
        </div>

        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="text" name="to_value" value="<?php echo $to_value; ?>" />&nbsp;
          <select name="to_unit">
            <option value="buckets"<?php if($to_unit == 'buckets') { echo " selected"; } ?>>buckets</option>
            <option value="butts"<?php if($to_unit == 'butts') { echo " selected"; } ?>>butts</option>
            <option value="firkins"<?php if($to_unit == 'firkins') { echo " selected"; } ?>>firkins</option>
            <option value="hogsheads"<?php if($to_unit == 'hogsheads') { echo " selected"; } ?>>hogsheads</option>
            <option value="pints"<?php if($to_unit == 'pints') { echo " selected"; } ?>>pints</option>
            <option value="gallons"<?php if($to_unit == 'gallons') { echo " selected"; } ?>>gallons</option>

          </select>

        </div>

        <input type="submit" name="submit" value="Submit" />
      </form>

      <br />
      <a href="index.php">Return to menu</a>

    </div>
  </body>
</html>
