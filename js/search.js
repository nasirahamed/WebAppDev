$.ajax({
    url: "xml/furnitures.xml", //your url
    type: "GET", //may not need this-fiddle did-default is GET
    dataType: "xml",
    //should not need to define 'data' on your own xml call
    //This code was extracted from http://jsfiddle.net/jensbits/PekQZ/light/ then altered
    success: function(xmlResponse) {
        console.log(xmlResponse);
        var data = $("furniture", xmlResponse).map(function() {
            return {
                value: $("name", this).text() + ", " + ($.trim($("type", this).text()) || "(unknown type)"),
                id: $("id", this).text()
            };
        }).get();
        $("#test").autocomplete({
            source: function(req, response) {
                var re = $.ui.autocomplete.escapeRegex(req.term);
                console.log(re);
                var matcher = new RegExp("^" + re, "i");
                response($.grep(data, function(item) {
                    return matcher.test(item.value);
                }));
            },
            minLength: 2,
            select: function(event, ui) {
                $("p#result").html(ui.item ? "<b><u>Search Result</u>: </b>" + ui.item.value + ", ID# " + ui.item.id : "Nothing selected, input was " + this.value);
            }
        });
    }
});