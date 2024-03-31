<?php
/*
write PHP code to do the measurement conversion for:
- Temperature
    - Celsius to Fahrenheit
    - Celsius to Kelvin
    - Fahrenheit to Celsius
    - Fahrenheit to Kelvin
    - Kelvin to Celsius
    - Kelvin to Fahrenheit
    - if the same unit is selected for both unitFrom and unitTo, then the value should be returned as it is.
- Speed
    - kmph to mps
    - kmph to knots
    - mps to kmph
    - mps to knots
    - knots to kmph
    - knots to mps
    - if the same unit is selected for both unitFrom and unitTo, then the value should be returned as it is.
- Mass
    - kg to grams
    - grams to kg
    - kg to pounds
    - pounds to kg
    - grams to pounds
    - pounds to grams
    - if the same unit is selected for both unitFrom and unitTo, then the value should be returned as it is.
- Length
    - meters to centimeters
    - centimeters to meters
    - meters to kilometers
    - kilometers to meters
    - meters to inches
    - inches to meters
    - if the same unit is selected for both unitFrom and unitTo, then the value should be returned as it is.
- Volume
    - liters to milliliters
    - milliliters to liters
    - liters to gallons
    - gallons to liters
    - if the same unit is selected for both unitFrom and unitTo, then the value should be returned as it is.

*/

class Converter
{
    public function convert($value, $unitFrom, $unitTo, $type)
    {
        if ($unitFrom == $unitTo) return $value;
        return match ($type) {
            'temperature' => match ([$unitFrom, $unitTo]) {
                ['celsius', 'fahrenheit'] => $value * 9 / 5 + 32,
                ['celsius', 'kelvin'] => $value + 273.15,
                ['fahrenheit', 'celsius'] => ($value - 32) * 5 / 9,
                ['fahrenheit', 'kelvin'] => ($value - 32) * 5 / 9 + 273.15,
                ['kelvin', 'celsius'] => $value - 273.15,
                ['kelvin', 'fahrenheit'] => ($value - 273.15) * 9 / 5 + 32,
            },
            'speed' => match ([$unitFrom, $unitTo]) {
                ['kmph', 'mps'] => $value / 3.6,
                ['kmph', 'knots'] => $value / 1.852,
                ['mps', 'kmph'] => $value * 3.6,
                ['mps', 'knots'] => $value * 1.94384,
                ['knots', 'kmph'] => $value * 1.852,
                ['knots', 'mps'] => $value / 1.94384,
            },
            'mass' => match ([$unitFrom, $unitTo]) {
                ['kg', 'grams'] => $value * 1000,
                ['kg', 'pounds'] => $value * 2.20462,
                ['grams', 'kg'] => $value / 1000,
                ['grams', 'pounds'] => $value / 453.592,
                ['pounds', 'kg'] => $value / 2.20462,
                ['pounds', 'grams'] => $value * 453.592,
            },
            'length' => match ([$unitFrom, $unitTo]) {
                ['meters', 'centimeters'] => $value * 100,
                ['meters', 'kilometers'] => $value / 1000,
                ['meters', 'inches'] => $value * 39.3701,
                ['centimeters', 'meters'] => $value / 100,
                ['centimeters', 'kilometers'] => $value / 100000,
                ['centimeters', 'inches'] => $value / 2.54,
                ['kilometers', 'meters'] => $value * 1000,
                ['kilometers', 'centimeters'] => $value * 100000,
                ['kilometers', 'inches'] => $value * 39370.1,
                ['inches', 'meters'] => $value / 39.3701,
                ['inches', 'centimeters'] => $value * 2.54,
                ['inches', 'kilometers'] => $value / 39370.1,
            },
            'volume' => match ([$unitFrom, $unitTo]) {
                ['liters', 'milliliters'] => $value * 1000,
                ['liters', 'gallons'] => $value / 3.78541,
                ['milliliters', 'liters'] => $value / 1000,
                ['milliliters', 'gallons'] => $value / 3785.41,
                ['gallons', 'liters'] => $value * 3.78541,
                ['gallons', 'milliliters'] => $value * 3785.41,
            },
        };
    }
}

$value = null;
$unitFrom = null;
$unitTo = null;
$type = null;
$result = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $value = $_POST['value'];
    $unitFrom = $_POST['unitFrom'];
    $unitTo = $_POST['unitTo'];
    $type = $_POST['type'];

    $converter = new Converter();
    $result = $converter->convert($value, $unitFrom, $unitTo, $type);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Measurement Converter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="content">

        <header>
            <h1>Measurement Converter</h1>
        </header>

        <form method="POST" id="converterForm">
            <div class="container">
                <select id="type" class="dropdown" name="type">
                    <option value="temperature" <?php echo $type == 'temperature' ? 'selected' : ''; ?>>Temperature</option>
                    <option value="speed" <?php echo $type == 'speed' ? 'selected' : ''; ?>>Speed</option>
                    <option value="mass" <?php echo $type == 'mass' ? 'selected' : ''; ?>>Mass</option>
                    <option value="length" <?php echo $type == 'length' ? 'selected' : ''; ?>>Length</option>
                    <option value="volume" <?php echo $type == 'volume' ? 'selected' : ''; ?>>Volume</option>
                </select>

                <div class="input-group">
                    <div class="input-section">
                        <input type="number" id="value1" class="input" value="<?php echo $value; ?>" name="value" />
                        <select id="unit1" class="dropdown" name="unitFrom"></select>
                    </div>
                    <div class="equals">=</div>
                    <div class="input-section">
                        <input type="number" id="value2" class="input" value="<?php echo $result; ?>" name="result" readonly />
                        <select id="unit2" class="dropdown" name="unitTo"></select>
                    </div>
                </div>
                <input type="submit" value="Convert" />
            </div>
        </form>
    </div>

    <footer>
        <p>&copy; Adel Ansari - <a href="https://github.com/adelansari/PHP_II" target="_blank">Github Repo</a></p>
    </footer>

    <script>
        const units = {
            temperature: ['Celsius', 'Fahrenheit', 'Kelvin'],
            speed: ['kmph', 'mps', 'knots'],
            mass: ['kg', 'grams', 'pounds'],
            length: ['meters', 'centimeters', 'kilometers', 'inches'],
            volume: ['liters', 'milliliters', 'gallons']
        };

        const typeSelect = document.getElementById('type');
        const unitSelects = [document.getElementById('unit1'), document.getElementById('unit2')];

        // Output the PHP variables as JavaScript variables
        const unitFrom = "<?php echo $unitFrom; ?>";
        const unitTo = "<?php echo $unitTo; ?>";

        function updateUnitOptions() {
            const selectedType = typeSelect.value;
            unitSelects.forEach((select, index) => {
                select.innerHTML = units[selectedType].map(unit => `<option value="${unit.toLowerCase()}" ${unit.toLowerCase() == (index == 0 ? unitFrom : unitTo) ? 'selected' : ''}>${unit}</option>`).join('');
            });
        }

        typeSelect.addEventListener('change', updateUnitOptions);
        updateUnitOptions();
    </script>
</body>

</html>