$(function() {

      var country = [
             { Name:"", Id:0}, 
            { Name:"Afghanistan", Id:1}, 
            { Name:"Argentina", Id:2}, 
            { Name:"Australia", Id:3}, 
            { Name:"Austria", Id:4}, 
            { Name:"Bolivia", Id:5}, 
            { Name:"Bosnia and Herzegovina", Id:6},  
            { Name:"Brazil", Id:7}, 
            { Name:"Brunei Darussalam", Id:8}, 
            { Name:"Bulgaria", Id:9}, 
            { Name:"Canada", Id:10}, 
            { Name:"China", Id:11}, 
            { Name:"Colombia", Id:12}, 
            { Name:"Costa Rica", Id:13}, 
            { Name:"Denmark", Id:14}, 
            { Name:"Egypt", Id:15}, 
            { Name:"Finland", Id:16}, 
            { Name:"France", Id:17}, 
            { Name:"Georgia", Id:18}, 
            { Name:"Germany", Id:19}, 
            { Name:"Hong Kong", Id:20}, 
            { Name:"India", Id:21}, 
            { Name:"Indonesia", Id:22}, 
            { Name:"Iran", Id:23}, 
            { Name:"Iraq", Id:24}, 
            { Name:"Ireland", Id:25}, 
            { Name:"Israel", Id:26}, 
            { Name:"Italy", Id:27}, 
            { Name:"Jamaica", Id:28}, 
            { Name:"Japan", Id:29}, 
            { Name:"Kenya", Id:30}, 
            { Name:"Kiribati", Id:31}, 
            { Name:"Kuwait", Id:32}, 
            { Name:"Kyrgyzstan", Id:32}, 
            { Name:"Laos", Id:33}, 
            { Name:"Madagascar", Id:34}, 
            { Name:"Malaysia", Id:35}, 
            { Name:"Maldives", Id:36}, 
            { Name:"Mexico", Id:37}, 
            { Name:"Myanmar", Id:38}, 
            { Name:"Nepal", Id:39}, 
            { Name:"Netherlands", Id:40}, 
            { Name:"New Zealand", Id:41}, 
            { Name:"North Korea", Id:42},  
            { Name:"Pakistan", Id:43}, 
            { Name:"Papua New Guinea", Id:44}, 
            { Name:"Paraguay", Id:45}, 
            { Name:"Peru", Id:46}, 
            { Name:"Philippines", Id:47}, 
            { Name:"Poland", Id:48}, 
            { Name:"Portugal", Id:49}, 
            { Name:"Puerto Rico", Id:50}, 
            { Name:"Qatar", Id:51}, 
            { Name:"Romania", Id:52}, 
            { Name:"Saudi Arabia", Id:53}, 
            { Name:"Singapore", Id:54}, 
            { Name:"South Africa", Id:55}, 
            { Name:"South Georgia", Id:56}, 
            { Name:"South Korea", Id:57}, 
            { Name:"Spain", Id:58}, 
            { Name:"Sri Lanka", Id:59}, 
            { Name:"Taiwan", Id:60}, 
            { Name:"Thailand", Id:61}, 
            { Name:"Timor-Leste", Id:62}, 
            { Name:"Turkey", Id:63},  
            { Name:"Uganda", Id:64}, 
            { Name:"Ukraine", Id:65}, 
            { Name:"United Arab Emirates", Id:66}, 
            { Name:"United Kingdom", Id:67}, 
            { Name:"United States", Id:68}, 
            { Name:"Uruguay", Id:69}, 
            { Name:"Uzbekistan", Id:70},
            { Name:"Vatican City", Id:71}, 
            { Name:"Venezuela", Id:72}, 
            { Name:"Vietnam", Id:73}
        ];

    $("#jsGrid").jsGrid({
      height: "300px",
      width: "100%",
      filtering: true,
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      scrollOffset: 0,
      deleteConfirm: "Do you really want to delete this data?",
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "getAllVenueGrid/",
            data: filter
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "addVenueGrid/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "updateVenueGrid/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "deleteVenueGrid/",
            data: item
          });
        }
      },

     fields: [
        {
          name: "venue",
          title: "Venue Name",
          type: "text",
          width: 150
        },
        {
          name: "city",
          title: "City",
          type: "text",
          width: 150
        },
        {
          name: "country",
          title: "Country",
          type: "select",
          items: country, 
          valueField: "Name", 
          textField: "Name"
        },
        { type: "control" }
      ]
    });
  });
