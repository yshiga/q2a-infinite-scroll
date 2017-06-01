$(function(){
  $('.ias-spinner').hide();
  if($(".qa-q-list").length && $(".qa-page-links-list").length) {
    if (material_lite) {
      var ias = $(".mdl-layout__content").ias({
        container: ".qa-q-list"
        ,item: ".qa-q-list-item"
        ,pagination: ".qa-page-links-list"
        ,next: ".qa-page-next"
        ,delay: 600
      });
    } else {      
        var ias = $.ias({
          container: ".qa-q-list"
          ,item: ".qa-q-list-item"
          ,pagination: ".qa-page-links-list"
          ,next: ".qa-page-next"
          ,delay: 600
        });
        ias.extension(new IASSpinnerExtension());
    }
    ias.extension(new IASTriggerExtension({
        text: infscr_lang.read_next,
        textPrev: infscr_lang.read_previous,
        offset: 100,
    }));
    ias.extension(new IASNoneLeftExtension({
      html: '<div class="ias_noneleft">'+infscr_lang.last_article+'</div>', // optionally
    }));
    ias.on('load', function() {
      $('.ias-spinner').show();
    });
    ias.on('noneLeft', function() {
      $('.ias-spinner').hide();
    });
    // ias.extension(new IASPagingExtension());
    // ias.extension(new IASHistoryExtension({
    //     prev: '.qa-page-prev',
    // }));
  }
});
