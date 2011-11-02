function initMCE(){
    
   tinyMCE.init({mode : "none",
      theme : "advanced",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      plugins: 'imagemanager, media, paste, advimage,advlink',
      theme_advanced_buttons1 : "bold,italic,strikethrough,separator,bullist,numlist,undo,redo,link,unlink, blockquote, |, justifyleft, justifycenter, justifyright, justifyfull, image ,media,  |, code",
      theme_advanced_buttons2 : "formatselect,filemanager,pastetext,pasteword,selectall",
      theme_advanced_buttons3 : "",
      relative_urls : false,
      content_css:	'/css/main.css',
      paste_auto_cleanup_on_paste : true,
      external_link_list_url : "/admin-arbo-site.html",
      theme_advanced_resizing : true});
}

$.editable.addInputType('mce', {
   element : function(settings, original) {
      var textarea = $('<textarea id="'+$(original).attr("id")+'_mce"/>');
      if (settings.rows) {
         textarea.attr('rows', settings.rows);
      } else {
         textarea.height(settings.height);
      }
      if (settings.cols) {
         textarea.attr('cols', settings.cols);
      } else {
         textarea.width(settings.width);
      }
      $(this).append(textarea);
         return(textarea);
      },
   plugin : function(settings, original) {
      initMCE();
      tinyMCE.execCommand("mceAddControl", true, $(original).attr("id")+'_mce');
      },
   submit : function(settings, original) {
      tinyMCE.triggerSave();
      tinyMCE.execCommand("mceRemoveControl", true, $(original).attr("id")+'_mce');
      },
   reset : function(settings, original) {
      tinyMCE.execCommand("mceRemoveControl", true, $(original).attr("id")+'_mce');
      original.reset();
   }
});