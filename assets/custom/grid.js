$(function() {

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
      deleteConfirm: "Do you really want to delete client?",
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "getAllCatGrid/",
            data: filter
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "addCatGrid/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "updateCatGrid/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "deleteCatGrid/",
            data: item
          });
        }
      },

     fields: [
        {
          name: "category",
          title: "Event Category Name",
          type: "text",
          width: 150
        },
        {
          name: "description",
          title: "Description",
          type: "text",
          width: 150
        },
        { type: "control" }
      ]
    });
  });
