<?php


class Converter
{
    private $conversionTable = [
        'speed' => ['kmph' => 1, 'mps' => 0.277778, 'knots' => 0.539957],
        'mass' => ['kg' => 1, 'grams' => 1000, 'pounds' => 2.20462],
        'length' => ['meters' => 1, 'centimeters' => 100, 'kilometers' => 0.001, 'inches' => 39.3701],
        'volume' => ['liters' => 1, 'milliliters' => 1000, 'gallons' => 0.264172]
    ];

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
                default => $value
            },
            default => $value * $this->conversionTable[$type][$unitTo] / $this->conversionTable[$type][$unitFrom]
        };
    }
}

$value = $_POST['value'] ?? null;
$unitFrom = $_POST['unitFrom'] ?? null;
$unitTo = $_POST['unitTo'] ?? null;
$type = $_POST['type'] ?? null;
$result = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Spline+Sans+Mono:ital,wght@0,300..700;1,300..700&family=VT323&display=swap" rel="stylesheet">
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
        <p>&copy; Adel Ansari - <a href="https://github.com/adelansari/PHP_II/tree/main/Exercises/PHP-MAMP/phpDir/src/measurement-conversion" target="_blank">Github Repo</a></p>
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