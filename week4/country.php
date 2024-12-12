<!DOCTYPE html>
<html>
    <body>
        <form action="countrySelection.php">
            <label for="country" method="get">Choose a country:</label>
            <select name="country" id="country">
                <option value="Malaysia">Malaysia</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Japan">Japan</option>
                <option value="Singapore">Singapore</option>
                <option value="United State">United State</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Thailand">Thailand</optiion>
                <option value="China">China</option>
                <option value="Philippine">Philippine</option>
                <option value="Vietnam">Vietnam</option>
            </select>
            <br><label for="year" method="get">Choose your date:</label>
            <select name="year" id="year">
                <?php
                for ($year = 2000; $year - 2024; $year++) {
                    echo "<option value ='$year'>$year</option>";
                }
                ?>
            </select>
            <label for="month" method="get"></label>
            <select name="month" id="month">
                <?php
                for ($month = 1; $month <= 12; $month++) {
                    echo "<option value ='$month'>$month</option>";
                }
                ?>
            </select>
            <label for="day" method="get"></label>
            <select name="day" id="day">
                <?php
                for ($day = 1; $day <= 31; $day++) {
                    echo "<option value='$day'>$day</option>";
                }
                ?>
            </select>
            <br><input type="submit" value="Submit">
            
        </form>
    </body>
</html>