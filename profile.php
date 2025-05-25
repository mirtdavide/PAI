<?php
$mysqli = new mysqli("localhost", "root", "", "pai");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$userMail = $_GET['user'] ?? '';

$stmt = $mysqli->prepare("SELECT username, mail, role, country, register_date FROM users WHERE mail = ?");
$stmt->bind_param("s", $userMail);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<h2>User not found</h2>";
    exit;
}
$originalDate = $user['register_date'];
$formattedDate = date("M j, Y", strtotime($originalDate));
// Optional: fetch stats
$posts = $mysqli->query("SELECT COUNT(*) AS count FROM posts WHERE user = '$userMail'")->fetch_assoc()['count'];
$threads = $mysqli->query("SELECT COUNT(*) AS count FROM thread WHERE user = '$userMail'")->fetch_assoc()['count'];
$total = $posts + $threads;
$countries = [
  "AF" => "🇦🇫 Afghanistan",
  "AL" => "🇦🇱 Albania",
  "DZ" => "🇩🇿 Algeria",
  "AD" => "🇦🇩 Andorra",
  "AO" => "🇦🇴 Angola",
  "AR" => "🇦🇷 Argentina",
  "AM" => "🇦🇲 Armenia",
  "AU" => "🇦🇺 Australia",
  "AT" => "🇦🇹 Austria",
  "AZ" => "🇦🇿 Azerbaijan",
  "BH" => "🇧🇭 Bahrain",
  "BD" => "🇧🇩 Bangladesh",
  "BY" => "🇧🇾 Belarus",
  "BE" => "🇧🇪 Belgium",
  "BZ" => "🇧🇿 Belize",
  "BJ" => "🇧🇯 Benin",
  "BO" => "🇧🇴 Bolivia",
  "BR" => "🇧🇷 Brazil",
  "BG" => "🇧🇬 Bulgaria",
  "CA" => "🇨🇦 Canada",
  "CL" => "🇨🇱 Chile",
  "CN" => "🇨🇳 China",
  "CO" => "🇨🇴 Colombia",
  "HR" => "🇭🇷 Croatia",
  "CU" => "🇨🇺 Cuba",
  "CZ" => "🇨🇿 Czech Republic",
  "DK" => "🇩🇰 Denmark",
  "EG" => "🇪🇬 Egypt",
  "FI" => "🇫🇮 Finland",
  "FR" => "🇫🇷 France",
  "DE" => "🇩🇪 Germany",
  "GR" => "🇬🇷 Greece",
  "HU" => "🇭🇺 Hungary",
  "IN" => "🇮🇳 India",
  "ID" => "🇮🇩 Indonesia",
  "IR" => "🇮🇷 Iran",
  "IQ" => "🇮🇶 Iraq",
  "IE" => "🇮🇪 Ireland",
  "IT" => "🇮🇹 Italy",
  "JP" => "🇯🇵 Japan",
  "KR" => "🇰🇷 South Korea",
  "MY" => "🇲🇾 Malaysia",
  "MX" => "🇲🇽 Mexico",
  "NL" => "🇳🇱 Netherlands",
  "NZ" => "🇳🇿 New Zealand",
  "NG" => "🇳🇬 Nigeria",
  "NO" => "🇳🇴 Norway",
  "PK" => "🇵🇰 Pakistan",
  "PE" => "🇵🇪 Peru",
  "PH" => "🇵🇭 Philippines",
  "PL" => "🇵🇱 Poland",
  "PT" => "🇵🇹 Portugal",
  "RU" => "🇷🇺 Russia",
  "SA" => "🇸🇦 Saudi Arabia",
  "RS" => "🇷🇸 Serbia",
  "SG" => "🇸🇬 Singapore",
  "ZA" => "🇿🇦 South Africa",
  "ES" => "🇪🇸 Spain",
  "SE" => "🇸🇪 Sweden",
  "CH" => "🇨🇭 Switzerland",
  "TH" => "🇹🇭 Thailand",
  "TR" => "🇹🇷 Turkey",
  "UA" => "🇺🇦 Ukraine",
  "AE" => "🇦🇪 United Arab Emirates",
  "GB" => "🇬🇧 United Kingdom",
  "US" => "🇺🇸 United States",
  "VN" => "🇻🇳 Vietnam"
];
$stmt->close();
?>



<html>
    <head>
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        
    </head>
    
    <body>

        <?php require 'header.php'; ?>


        <div class="main-container">

            <div class = "top-container">
                <div class="container-title">
                    <p>Member-info</p> 
                </div>
                <div class="profile">
                    <img src="image.php?mail=<?= urlencode($user['mail']) ?>" alt="Profile image">
                    
                    <div class = "profile-info">
                        <span class="username-label"><?= htmlspecialchars($user['username']) ?></span>
                        <div class = "label-list">
                             <span class="label <?= htmlspecialchars($user['role']) ?>"><?= htmlspecialchars($user['role']) ?></span>
                        </div>
                        <span class = "role-country">From:  <?= $countries[$user["country"]] ?? htmlspecialchars($user["country"]) ?> </span>
                        <span class = "joined-label">Joined: <?= htmlspecialchars($formattedDate) ?></span>

                        <div class="stats-container">
                            <div class="stat">
                              <span class="stat-label">Posts</span>
                              <span class="value"> <?= htmlspecialchars($posts) ?></span>
                            </div>
                            <div class="stat">
                                <span class="stat-label">Threads</span>
                                <span class="value"><?= htmlspecialchars($threads) ?></span>
                              </div>
                              <div class="stat">
                                <span class="stat-label">Total</span>
                                <span class="value"><?= htmlspecialchars($total) ?></span>
                            </div>
                        </div>

                        <button class="load-more-button" onclick="window.location.href='update_profile.php?user=<?= urlencode($user['mail']) ?>'">Update Profile</button>
                    </div>
                </div>
            </div>
            <div class = "bottom-container">
                <div class="container-title">
                    <p>Member-Posts</p> 
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
                <div class="post">
                    <div class = "post-left">
                        <img src="images/profile.png" alt="Profile Image" class="profile-image">
                        <div class="post-info">
                            <h3 class="post-title">Post Title 1</h3>
                            <p class="user-label">Author Name</p>
                        </div>
                    </div>
                    <div class ="post-center">
                        <p class = "post-label">Replies</p>
                    </div>
                    <div class = "post-right">
                        <div clas = "post-info">
                            <h3 class="post-label">Last Reply:</h3>
                            <p class="user-label">Replier Name</p>
                        </div>
                        <img src="images/profile.png" alt="Profile Image" class="replier-image">
                    </div>
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>         
    </body>    
</html>