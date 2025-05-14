<html>
    <head>
        <link rel="stylesheet" href="/profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        
    </head>
    <body>
        <?php require 'header/header.php'; ?>

        <div class="main-container">

            <div class = "top-container">
                <div class="container-title">
                    <p>Member-info</p> 
                </div>
                <div class="profile">
                    <div class="profile-container">
                        <label for="fileInput">
                            <img src="images/profile.png" alt="Profile image">
                        </label>
                        <input type="file" id="fileInput" accept="image/*" style="display: none;">
                    </div>
                    <div class = "profile-info">
                        <span class = "username-label" contenteditable="true">Checco Zalone II</span>
                        <div class = "label-list">
                            <span class="label moderator">Forum Moderator</span>
                            <span class="label developer">Developer</span>
                        </div>
                        <div class="country-wrapper">
                            <span class = "role-country">Administrator - From:</span>
                            <select id="country-select" class="country-select">
                                <option value="AF">🇦🇫 Afghanistan</option>
                                <option value="AL">🇦🇱 Albania</option>
                                <option value="DZ">🇩🇿 Algeria</option>
                                <option value="AD">🇦🇩 Andorra</option>
                                <option value="AO">🇦🇴 Angola</option>
                                <option value="AR">🇦🇷 Argentina</option>
                                <option value="AM">🇦🇲 Armenia</option>
                                <option value="AU">🇦🇺 Australia</option>
                                <option value="AT">🇦🇹 Austria</option>
                                <option value="AZ">🇦🇿 Azerbaijan</option>
                                <option value="BH">🇧🇭 Bahrain</option>
                                <option value="BD">🇧🇩 Bangladesh</option>
                                <option value="BY">🇧🇾 Belarus</option>
                                <option value="BE">🇧🇪 Belgium</option>
                                <option value="BZ">🇧🇿 Belize</option>
                                <option value="BJ">🇧🇯 Benin</option>
                                <option value="BO">🇧🇴 Bolivia</option>
                                <option value="BR">🇧🇷 Brazil</option>
                                <option value="BG">🇧🇬 Bulgaria</option>
                                <option value="CA">🇨🇦 Canada</option>
                                <option value="CL">🇨🇱 Chile</option>
                                <option value="CN">🇨🇳 China</option>
                                <option value="CO">🇨🇴 Colombia</option>
                                <option value="HR">🇭🇷 Croatia</option>
                                <option value="CU">🇨🇺 Cuba</option>
                                <option value="CZ">🇨🇿 Czech Republic</option>
                                <option value="DK">🇩🇰 Denmark</option>
                                <option value="EG">🇪🇬 Egypt</option>
                                <option value="FI">🇫🇮 Finland</option>
                                <option value="FR">🇫🇷 France</option>
                                <option value="DE">🇩🇪 Germany</option>
                                <option value="GR">🇬🇷 Greece</option>
                                <option value="HU">🇭🇺 Hungary</option>
                                <option value="IN">🇮🇳 India</option>
                                <option value="ID">🇮🇩 Indonesia</option>
                                <option value="IR">🇮🇷 Iran</option>
                                <option value="IQ">🇮🇶 Iraq</option>
                                <option value="IE">🇮🇪 Ireland</option>
                                <option value="IT" selected>🇮🇹 Italy</option>
                                <option value="JP">🇯🇵 Japan</option>
                                <option value="KR">🇰🇷 South Korea</option>
                                <option value="MY">🇲🇾 Malaysia</option>
                                <option value="MX">🇲🇽 Mexico</option>
                                <option value="NL">🇳🇱 Netherlands</option>
                                <option value="NZ">🇳🇿 New Zealand</option>
                                <option value="NG">🇳🇬 Nigeria</option>
                                <option value="NO">🇳🇴 Norway</option>
                                <option value="PK">🇵🇰 Pakistan</option>
                                <option value="PE">🇵🇪 Peru</option>
                                <option value="PH">🇵🇭 Philippines</option>
                                <option value="PL">🇵🇱 Poland</option>
                                <option value="PT">🇵🇹 Portugal</option>
                                <option value="RU">🇷🇺 Russia</option>
                                <option value="SA">🇸🇦 Saudi Arabia</option>
                                <option value="RS">🇷🇸 Serbia</option>
                                <option value="SG">🇸🇬 Singapore</option>
                                <option value="ZA">🇿🇦 South Africa</option>
                                <option value="ES">🇪🇸 Spain</option>
                                <option value="SE">🇸🇪 Sweden</option>
                                <option value="CH">🇨🇭 Switzerland</option>
                                <option value="TH">🇹🇭 Thailand</option>
                                <option value="TR">🇹🇷 Turkey</option>
                                <option value="UA">🇺🇦 Ukraine</option>
                                <option value="AE">🇦🇪 United Arab Emirates</option>
                                <option value="GB">🇬🇧 United Kingdom</option>
                                <option value="US">🇺🇸 United States</option>
                                <option value="VN">🇻🇳 Vietnam</option>
                            </select>
                        </div>
                        <span class = "joined-label">Joined: March 2025</span>

                        <div class="stats-container">
                            <div class="stat">
                              <span class="stat-label">Posts</span>
                              <span class="value">11,145</span>
                            </div>
                            <div class="stat">
                                <span class="stat-label">Replies</span>
                                <span class="value">6,044</span>
                              </div>
                              <div class="stat">
                                <span class="stat-label">Total</span>
                                <span class="value">83</span>
                            </div>
                        </div>

                    <button class = "load-more-button" onclick = "window.location.href = 'profile.html'" >Update</button>       
                    </div>
                </div>
            </div>
        </div>

        <?php require 'footer/footer.php'; ?>
   
    </body>    
</html>