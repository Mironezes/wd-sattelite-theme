import {accordionToggler, checkboxToggler, sectionToggler, groupToggler, ajaxQuery, resetImage} from "./modules/helpers";
import {
  welcomeSection, logoSection, mainBgSection,  logoImageChooser, logoImageReset, 
  authorImageChooser, authorImageReset, authorImagePreviewChooser, authorImagePreviewReset,  
  topBackgroundWebpLgChooser, topBackgroundWebpLgReset, topBackgroundJpegLgChooser, topBackgroundJpegLgReset, topBackgroundWebpXsChooser,
  topBackgroundWebpXsReset, topBackgroundJpegXsChooser, topBackgroundJpegXsReset} from './modules/variables';

import mediaFileChooser from "./modules/media-file-chooser";

// Condition for calling our functions
const pluginPage = document.querySelector('#wdst-settings-page');

function Init() {
  if(pluginPage) {

    sectionToggler();
    checkboxToggler();
    accordionToggler();

    groupToggler(welcomeSection);
    groupToggler(logoSection);
    groupToggler(mainBgSection);

    mediaFileChooser(authorImageChooser);
    resetImage(authorImageReset);

    mediaFileChooser(authorImagePreviewChooser);
    resetImage(authorImagePreviewReset);

    mediaFileChooser(logoImageChooser);
    resetImage(logoImageReset);


    mediaFileChooser(topBackgroundWebpLgChooser);
    resetImage(topBackgroundWebpLgReset);

    mediaFileChooser(topBackgroundJpegLgChooser);
    resetImage(topBackgroundJpegLgReset);

    mediaFileChooser(topBackgroundWebpXsChooser);
    resetImage(topBackgroundWebpXsReset);

    mediaFileChooser(topBackgroundJpegXsChooser);
    resetImage(topBackgroundJpegXsReset);

  }
}

document.addEventListener('DOMContentLoaded', Init);