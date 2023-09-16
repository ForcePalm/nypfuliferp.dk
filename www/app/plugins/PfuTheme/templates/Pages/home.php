<div class="row">
    <div class="col-sm-9">
    </div>
    <div class="col-sm-3">
        <div class="col-sm-12">
            <div class="sidebar-div rounded">
        <?php
            $serverIP = '144.91.122.78';
            $serverPort = '30120';

            // Create the server query URL
            $serverQueryURL = "http://$serverIP:$serverPort/info.json";
            $playerQueryURL = "http://$serverIP:$serverPort/players.json";

            // Make the GET request
            $response = @file_get_contents($serverQueryURL);
            $playerResponse = @file_get_contents($playerQueryURL);
            // dd($response);
            if ($response === FALSE) {
                // Server is offline or unreachable
                echo "<p>Server is offline or unreachable.</p>";
            } else {
                // Server is online, parse the JSON response
                $serverInfo = json_decode($response, true);
                $playerInfo = json_decode($playerResponse, true);
                // dd($serverInfo);
                $img_b64 = $serverInfo['icon'];
               // dd($img_b64);
                if ($serverInfo !== null) {
                // Server is online, and here's some info about it
                    echo "<div align='center'><img width='150' src='data:img/png;base64, $img_b64'></div> ";
                    echo "<p> <strong>Server is <span style='color: green;'> online</span></strong> </p><br>";
                    echo "<p>Server Name: " . $serverInfo['vars']['sv_projectName' ] . "</p><br>";
                    echo "<p>Players Online: " . count($playerInfo) . "</p><br>";
                    echo "<p>Max Players: " . $serverInfo['vars']['sv_maxClients'] . "</p><br>";
                } else {
                    // Unable to parse the JSON response
                    echo "<p>Unable to fetch server information.</p>";
                }
            }
            ?>
            </div>
        </div>
        
    </div>
</div>
