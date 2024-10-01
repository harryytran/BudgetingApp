<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Powered YouTube Recommendations</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>AI-Powered YouTube Recommendations</h1>
        <button class="home-btn" onclick="location.href='index.php'">Home</button>
    </header>
    <div class="container">
        <?php
        require_once 'vendor/autoload.php';

        use OpenAI\Client;
        use Google_Client;
        use Google_Service_YouTube;

        function getAIRecommendations($userTransactions) {
            $apiKey = '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';
            $client = OpenAI::client($apiKey);

            $transactionSummary = summarizeTransactions($userTransactions);

            $prompt = "Based on the following user transaction summary, suggest 3 personalized video topics for improving financial habits. Each suggestion should be a short, specific topic suitable for a YouTube search. Transaction summary: $transactionSummary";

            $response = $client->completions()->create([
                'model' => 'text-davinci-003',
                'prompt' => $prompt,
                'max_tokens' => 100,
                'temperature' => 0.7,
            ]);

            return explode("\n", trim($response->choices[0]->text));
        }

        function summarizeTransactions($userTransactions) {
            $summary = "Total spent: $" . array_sum(array_column($userTransactions, 'amount')) . ". ";
            $categories = array_count_values(array_column($userTransactions, 'category'));
            foreach ($categories as $category => $count) {
                $summary .= "$category: $count transactions. ";
            }
            return $summary;
        }

        function getYouTubeVideos($topics) {
            $client = new Google_Client();
            $client->setDeveloperKey('AIzaSyBL4QimoCzn8nRSQvBBSMFBcnKkIIS77q8');

            $youtube = new Google_Service_YouTube($client);
            $videos = [];

            foreach ($topics as $topic) {
                $searchResponse = $youtube->search->listSearch('snippet', [
                    'q' => $topic,
                    'type' => 'video',
                    'maxResults' => 1,
                ]);

                if (!empty($searchResponse['items'])) {
                    $video = $searchResponse['items'][0];
                    $videos[] = [
                        'title' => $video['snippet']['title'],
                        'description' => $video['snippet']['description'],
                        'thumbnail' => $video['snippet']['thumbnails']['medium']['url'],
                        'videoId' => $video['id']['videoId'],
                    ];
                }
            }

            return $videos;
        }

        // Fetch user transactions (replace with actual database query)
        $userTransactions = [
            ['amount' => 1500, 'category' => 'Rent'],
            ['amount' => 500, 'category' => 'Food'],
            ['amount' => 200, 'category' => 'Fun'],
            // Add more transactions as needed
        ];

        // Get AI-powered topic suggestions
        $aiTopics = getAIRecommendations($userTransactions);

        // Get YouTube videos based on AI suggestions
        $youtubeVideos = getYouTubeVideos($aiTopics);

        // Display YouTube video recommendations
        foreach ($youtubeVideos as $video) {
            echo '<div class="video-preview">';
            echo '<a href="https://www.youtube.com/watch?v=' . $video['videoId'] . '" target="_blank">';
            echo '<img src="' . $video['thumbnail'] . '" alt="' . $video['title'] . '">';
            echo '<h3>' . $video['title'] . '</h3>';
            echo '</a>';
            echo '<p>' . substr($video['description'], 0, 100) . '...</p>';
            echo '</div>';
        }

        // If no recommendations, show a default message
        if (empty($youtubeVideos)) {
            echo '<p>No video recommendations available at the moment. Please try again later.</p>';
        }
        ?>
    </div>
</body>
</html>
