GoogleLanguage
==============

This plugin works with the Google Language API and can be used to translate a text in all the languages provided by the API.

![Screenshot](http://farm6.static.flickr.com/5258/5459079802_38c4728235_b.jpg)

How to use
----------


First you must to include the JS files in the head of your HTML document.

        #HTML
        <script type="text/javascript" src="mootools-core.js"></script>
        <script type="text/javascript" src="GoogleLanguage.js"></script>

In your JS.

        #JS
        window.addEvent('domready', function(){
          //original language text
          var from = "en", 
          //destination language    
              to = "fr", 
          //grab the original text
              text = document.id('input').get('value'),
              //classical usage
              try = new GoogleLanguage({text: text,from: from, to: to, 
                      onRequest: function() {
                          //do something here while loading
                      },
                      onSuccess: function(resp) {
                          //put the translated text where you want.
                          document.id('results').set('text', resp);
                      }
              });
              document.id('trans').addEvent('click', function(){
                      try.translate();
              });

              //you can use setting up the element with setter and getter as below
              $('text1').set('translate',{from: 'ro',
                                          to:'en',
                                          onRequest: function(){ 
                                              //do something onLoading
                                          },
                                          onComplete: function(){ 
                                              //do something when has completed
                                          }
                            });

              $('text1').addEvent('click', function(){
                         $('text1').translate();
              }); 

              $('text2').set('translate',{from: 'ro',
                                          to:'en',
                                          onRequest: function(){ 
                                              //do something onLoading
                                          },
                                          onComplete: function(){ 
                                              //do something when has completed
                                          }
                            });

              $('text2').addEvent('click', function(){
                         $('text2').translate();
              }); 
        });


In your HTML
        <textarea id="input"></textarea>
        <input type="button" id="trans" />   
        <div id="results"></div> 
        <div id="text1"></div>
        <div id="text2"></div>
### Notes:

You can view in action:

- [http://thinkphp.ro/apps/js-hacks/google-translate/demos/demo1.html](http://thinkphp.ro/apps/js-hacks/google-translate/demos/demo1.html)
- [http://thinkphp.ro/apps/js-hacks/google-translate/demos/demo2.html](http://thinkphp.ro/apps/js-hacks/google-translate/demos/demo2.html)