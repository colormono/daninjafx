$(document).ready(function() {
  /**
   * BURGER MENU
   */
  var nav = $('.nav');
  var btn = $('.nav-toggle a');
  btn.on('click', function() {
    if (nav.hasClass('nav-open')) {
      nav.removeClass('nav-open');
    } else {
      nav.addClass('nav-open');
    }
  });

  /**
   * CUSTOM VIDEO PLAYER
   * https://github.com/sampotts/plyr
   */
  const player = new Plyr(
    document.querySelectorAll(
      '.wp-block-embed.is-type-video .wp-block-embed__wrapper'
    )
  );

  /**
   * MODAL GALLERIES
   * http://dimsemenov.com/plugins/magnific-popup/documentation.html
   */
  $('.wp-block-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile mfp-with-zoom',
    removalDelay: 300,
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        //return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
      }
    },
    zoom: {
      enabled: true, // By default it's false, so don't forget to enable it

      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function

      // The "opener" function should return the element from which popup will be zoomed in
      // and to which popup will be scaled down
      // By defailt it looks for an image tag:
      opener: function(openerElement) {
        // openerElement is the element on which popup was initialized, in this case its <a> tag
        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
        return openerElement.is('img')
          ? openerElement
          : openerElement.find('img');
      }
    }
  });

  $('.wp-block-image').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile mfp-with-zoom',
    removalDelay: 300,
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        //return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
      }
    },
    zoom: {
      enabled: true, // By default it's false, so don't forget to enable it

      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function

      // The "opener" function should return the element from which popup will be zoomed in
      // and to which popup will be scaled down
      // By defailt it looks for an image tag:
      opener: function(openerElement) {
        // openerElement is the element on which popup was initialized, in this case its <a> tag
        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
        return openerElement.is('img')
          ? openerElement
          : openerElement.find('img');
      }
    }
  });

  /**
   * FLICKr Gallery
   *
   * Keys: https://www.flickr.com/services/apps/create/noncommercial/
   * Docs: https://www.flickr.com/services/api/
   * Get ID from user name: https://www.webpagefx.com/tools/idgettr/
   */
  if (document.getElementById('flickr-photos') !== null) {
    var container = $('#flickr-photos');
    const API_KEY = '135d9a49daf0917d82c3905ae02ab011';
    const USER_ID = '157126863@N08'; //8554589@N08
    const ENDPOINT = 'flickr.people.getPublicPhotos';
    const PER_PAGE = 40;

    var url = `https://api.flickr.com/services/rest/?method=${ENDPOINT}&format=json&nojsoncallback=1&api_key=${API_KEY}&user_id=${USER_ID}&per_page=${PER_PAGE}`;

    // Make a request for a user with a given ID
    axios
      .get(url)
      .then(function(response) {
        // handle success
        //console.log(response);
        const photos = response.data.photos.photo;

        /**
         * Photo example
         *
         * https://farm1.staticflickr.com/2/1418878_1e92283336_m.jpg
         * farm: 1
         * server: 2
         * id: 1418878
         * secret: 1e92283336
         * size: m
         *
         * Docs: https://www.flickr.com/services/api/misc.urls.html
         */
        photos.map(photo => {
          const thumbnail = `<img src="https://farm${
            photo.farm
          }.staticflickr.com/${photo.server}/${photo.id}_${
            photo.secret
          }.jpg" />`;

          const permalink = `https://farm${photo.farm}.staticflickr.com/${
            photo.server
          }/${photo.id}_${photo.secret}_h.jpg`;

          container.append(
            `<div class="flickr-item"><a href=${permalink}>${thumbnail}</a></div>`
          );
        });

        // Apply masonry
        var $grid = container.masonry({
          // options
          itemSelector: '.flickr-item'
        });

        // layout Masonry after each image loads
        $grid.imagesLoaded().progress(function() {
          $grid.masonry('layout');
        });
      })
      .catch(function(error) {
        // handle error
        console.log(error);
      })
      .then(function() {
        // always executed
      });
  }
});
