Class: GoogleLanguage {#GoogleLanguage}
=======================================

This plugin works with the Google Language API and can be used to translate a text in all the languages provided by the API.


GoogleLanguage Method: constructor {#GoogleLanguage: constructor}
-----------------------------------------------------------------

### Syntax:

    var t = new GoogleLanguage(options);

### Arguments:

1. options

#### Options

1. text (String, by default '')   - input text  
2. from (String, by default 'en') - source language
3.   to (String, by default 'fr') - target language


### Returns:

(*Object*) This instance of GoogleLanguage.

### Events:

### request

(*Function*) - fired when you make request.

### Signature:

    onRequest();

#### Arguments:

void.

### loading

(*Function*) - fired when you make request.

### Signature:

    onLoading();

#### Arguments:

void.


### success

(*Function*) - callback to execute when the data returns from service.

### Signature:

    onSuccess(responseJSON, responseText);

#### Arguments:

- responseJSON (*Object JSON*) - the response from server in format JSON.
- responseText (*String*) - the response from server as String.


### failure

(*Function*) - callback to execute when on failure.

### Signature:

    onFailure(xhr);

#### Arguments:

- xhr (*Object*) - the object XMLHttpRequest.



Object: Element.Properties (#Element-Properties)
================================================

see: [Element.Properties](https://github.com/mootools/mootools-core/blob/master/Docs/Element/Element.md#Element-Properties)

Element Property: translate {#Element-Properties: translate}
------------------------------------------------------------

### Setter

Sets a default GoogleLanguage instance for an Element.

### Syntax:

    el.set('translate'[, options]);

#### Arguments:

2. options - (*object*) the GoogleLanguage options.

#### Returns:

* (*element*) the original element.

#### Example:

$('text').set('translate',{from: 'en', to: 'fr'});


### Getter

Returns the previously set GoogleLanguage instance (or a new one with default options).

#### Syntax:

	el.get('translate');

#### Arguments:

1. property - (*string*) the GoogleLanguage property argument.

### Returns:

* (*object*) The GoogleLanguage instance.

#### Example:

     myElem.get('translate').translate();


Element Method: translate {#Element:translate}
-----------------------------------------------------------

This method translates the text which there is in element's property innerHTML.

### Syntax:

     elem.translate();

### Arguments:

     none.

### Returns:

* (element) This Element.

### Example:

    $('text').set('translate',{from: 'ro',
                                      to:'en',
                                      onRequest: function(){ 
                                          //do something onLoading
                                      },
                                      onComplete: function(){ 
                                          //do something when has completed
                                      }
                        });
    $('text').translate();


 