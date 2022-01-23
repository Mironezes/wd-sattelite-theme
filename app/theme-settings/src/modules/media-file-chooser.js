// Built-in WP.media popup for Featured Images Settings
export default function mediaFileChooser(obj) {
  const btns = Array.from(document.querySelectorAll(obj.select));

  btns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();

      let image_frame;

      if(!obj.types) {
        obj.types = ['image'];
      }
      if(!obj.is_multiple) {
        obj.is_multiple = false
      }

      image_frame = wp.media({
        title: obj.title,
        multiple: obj.is_multiple,
        library: {
          orderby: "date", 
          query: true, 
          post_mime_type: obj.types
        },
        button: {
          text: 'Select'
        }
      });

      image_frame.on('close', function() {
        let parent = btn.closest('.image-chooser');
        let selection = image_frame.state().get('selection');
        let target_input = parent.querySelector(obj.target); 

        let gallery_urls = new Array();
        let index = 0;
  
          if(parent) {
            if(obj.is_multiple == true) {

              selection.forEach(function(attachment) {
                gallery_urls[index] = attachment.attributes['id'];
                index++;
              });

              let urls = gallery_urls.join(",");
              if(target_input) {
                target_input.value = urls;
              }
            }
            else {
              selection.forEach(function(attachment) {
                gallery_urls[index] = [attachment.attributes['url'], attachment.attributes['id']];
                index++;
              });

              if(target_input) {
                let image_preview = parent.querySelector('.wdst-image-chooser-preview');
                target_input.value = gallery_urls[0][1];
                image_preview.style.backgroundImage = "url(" + gallery_urls[0][0] + ")";
              }
            } 
          }
      });

      image_frame.on('open', function() {

        let current_section = btn.closest('.image-chooser');
        let selection = image_frame.state().get('selection');
        let ids_el = current_section.querySelector(obj.target);

        if(obj.is_multiple == true) {
          if(ids_el.value) {
            let ids_arr = ids_el.value.split(',');
            ids_arr.forEach(function(id) {
              let attachment = wp.media.attachment(id);
              attachment.fetch();
              selection.add(attachment ? [attachment] : []);
            });
          }
        }
        else {
          if(ids_el.value) {
            let attachment = wp.media.attachment(ids_el.value);
            attachment.fetch();
            selection.add(attachment ? [attachment] : []);
          }
        }
      });

      image_frame.open();
    });
  });


}