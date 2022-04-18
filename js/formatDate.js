function formatDate(createdOnDate, timeLimit) {
    // function convertDateToUTC(date) {
    //     return new Date(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), date.getUTCHours(), date.getUTCMinutes(), date.getUTCSeconds());
    // }
    createdDate = new Date(createdOnDate.innerText);
    // createdDate = convertDateToUTC(createdDate);


    // if time limit is in days, remove text, & add to creation date-------------------//
    var limitdays = timeLimit.innerText;
    if (limitdays.includes(" days")) {
        limitdays = limitdays.replace("days", "");
        limitdays = parseInt(limitdays);

        function addDaysToDate(createddate, days) {
            var result = createddate;
            result.setDate(createddate.getDate() + days);
            return result;
        }

        var newDate = addDaysToDate(createdDate, limitdays);
        newDate.setHours(newDate.getHours() + 1);             //account for UTC + 01:00

        // format newdate to iso & remove unwanted characters
        newDate = newDate.toISOString();
        if (newDate.includes("T")) {
            newDate = newDate.replace("T", " ");
        }
        if (newDate.includes(".000Z")) {
            newDate = newDate.replace(".000Z", "");
        }
    }
    ;
    //===================================================================================//

    // if time limit is in hours, remove text, & add to creation date-------------------//
    var limithours = timeLimit.innerText;
    if (limithours.includes(" hours")) {
        limithours = limithours.replace("hours", "");
        limithours = parseInt(limithours);

        function addHoursToDate(createddate, hours) {
            var result = createddate;
            result.setUTCHours(createddate.getUTCHours() + hours);
            return result;
        }

        var newDate = addHoursToDate(createdDate, limithours);
        newDate.setUTCHours(newDate.getUTCHours() + 1);             //account for UTC + 01:00


        // format newdate to iso & remove unwanted characters
        newDate = newDate.toISOString();
        if (newDate.includes("T")) {
            newDate = newDate.replace("T", " ");
        }
        if (newDate.includes(".000Z")) {
            newDate = newDate.replace(".000Z", "");
        }
    }
    ;
    //===================================================================================//

    // if time limit is in mins, remove text, & add to creation date-------------------//
    var limitmins = timeLimit.innerText;
    if (limitmins.includes(" minutes")) {
        limitmins = limitmins.replace("minutes", "");
        limitmins = parseInt(limitmins);

        function addMinsToDate(createddate, mins) {
            var result = createddate;
            result.setUTCMinutes(createddate.getUTCMinutes() + mins);
            return result;
        }

        var newDate = addMinsToDate(createdDate, limitmins);
        newDate.setHours(newDate.getHours() + 1);             //account for UTC + 01:00


        // format newdate to iso & remove unwanted characters
        newDate = newDate.toISOString();
        if (newDate.includes("T")) {
            newDate = newDate.replace("T", " ");
        }
        if (newDate.includes(".000Z")) {
            newDate = newDate.replace(".000Z", "");
        }
    }
    ;
    //===================================================================================//
    return newDate;
};
