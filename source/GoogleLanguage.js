   var GoogleLanguage = new Class({
       Implements: [Options, Events],
       options: {
          url: 'translate.php',
          method: 'post',
          text: '',
          from: 'en',
          to: 'fr'
       },
       initialize: function(options) {
          this.setOptions(options);
         return this;
       },
       translate: function(opts) {
          var opts = opts || {},
              req = new Request.JSON({
                    url: this.options.url,
                    method: this.options.method,
                    onRequest: function() {
                    if(opts.onRequest && typeof(opts.onRequest) == 'function') {
                         opts.onRequest();
                      } else {
                         this.fireEvent('request').fireEvent('loading');
                      }
                    }.bind(this),
                    onFailure: function(xhr) {      
                      if(opts.onFailure && typeof(opts.onFailure) == 'function') {
                         opts.onFailure(xhr);
                      } else {
                         this.fireEvent('failure',xhr);
                      }
                    }.bind(this),
                    onSuccess: function(responseJSON,responseText) {
                         if(opts.onSuccess && typeof(opts.onSuccess) == 'function') {
                            opts.onSuccess(response.translatedText);
                         } else {
                            this.fireEvent('success',responseJSON.translatedText).fireEvent('complete',responseJSON.translatedText);
                         }
                    }.bind(this)  
              }),
              params = {text: opts.text || this.options.text,
                        from: opts.from || this.options.from, 
                          to: opts.to || this.options.to},
              data = {data: params}; 
              req.send(data);
       }
   });  

   Element.Properties.translate = {
           set: function(options) {
                var o = this.get('translate'),
                    elm = this,
                    options = Object.merge({onSuccess: function(resp){
                                         elm.set('text', resp);
                                  }}, options);
                    o.setOptions(options); 
             return this; 
           },
           get: function() {
                var t = this.retrieve('translate');
                if(!!!t) {
                    t = new GoogleLanguage({text: this.get('text')});
                    this.store('translate',t); 
                } 
             return t;
           } 
   }

   Element.implement({
         translate: function(options) {
              this.get('translate').translate();
            return this;
         } 
   });
