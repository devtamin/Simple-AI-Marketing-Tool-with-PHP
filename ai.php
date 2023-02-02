<?php 

require __DIR__.'/vendor/autoload.php';

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '---Please-enter-openai-key';

$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['prompt'];

$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => 'Writing 3 marketing Facebook caption for '. $prompt,
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

$response = json_decode($complete, true);
$response = $response["choices"][0]["text"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output</title>
    <style>
        .output-text{
            white-space: break-spaces;
        }
    </style>
</head>
<body>
    <h1>Out Put of 3 Facebook Marketing Captions for <?= $prompt?></h1>
    <div class="output-text">
        <?= $response?>
    </div>
</body>
</html>