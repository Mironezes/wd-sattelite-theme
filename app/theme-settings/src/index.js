import {getSiteInfo, accordionToggler, checkboxToggler, sectionToggler, groupToggler, ajaxQuery, resetInputs, toggleAllOptions} from "./modules/helpers";
import {featuredImageSection, polylangSection, featuredImagesListReset, organizationLogoReset, featuredImagesChooser, organizationLogoChooser, getOgranizationName, getSiteEmail, e410_Dictionary, excludedHostsDictionary, removeBrokenFeatured, fixEmptyPostsContent} from './modules/variables';

import schemaSectionSettings from "./modules/schema-settings";
import mediaFileChooser from "./modules/media-file-chooser";
import getPostsModal from "./modules/posts-modal";
import dictionaryHandler from "./modules/dictionary-handler";

// Condition for calling our functions
const pluginPage = document.querySelector('#wdst-settings-page');

function Init() {
  if(pluginPage) {

    sectionToggler();

    groupToggler(featuredImageSection);

    mediaFileChooser(featuredImagesChooser);

    resetInputs(featuredImagesListReset);

    getPostsModal(removeBrokenFeatured);
    getPostsModal(fixEmptyPostsContent);
    

    if(wdst_localize.is_polylang_exists && wdst_localize.is_polylang_setup) {
    }

    dictionaryHandler(excludedHostsDictionary);
    dictionaryHandler(e410_Dictionary);

    mediaFileChooser(organizationLogoChooser);
    resetInputs(organizationLogoReset);

    schemaSectionSettings();

    checkboxToggler();
    toggleAllOptions();
    accordionToggler();
  }
}

document.addEventListener('DOMContentLoaded', Init);