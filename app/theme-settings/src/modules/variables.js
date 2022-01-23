  // Selectors for our functions
  export  const welcomeSection = {
    toggler: '#wdst-welcome-screen input',
    target: '#welcome-screen-title',
    type: 'checkbox'
  };

  export  const logoSection = {
    toggler: '#wdst-header-logo-type select',
    type: 'select'
  };

  export const mainBgSection = {
    toggler: '#wdst-use-top-bg-img input',
    target: '#wdst-top-bg-img',
    type: 'checkbox'
  }
  
  export const authorImageReset = {
    button: '#wdst-author-image button.reset',
    target: '#wdst-author-image input'
  };

  export const authorImagePreviewReset = {
    button: '#wdst-author-preview-image button.reset',
    target: '#wdst-author-preview-image input'
  };

  export const logoImageReset = {
    button: '#wdst-header-logo-image button.reset',
    target: '#wdst-header-logo-image input'
  };

  export const authorImageChooser = {
    select: '#wdst-author-image button.choose',
    target: '#wdst-author-image input[type="text"]',
    is_multiple: false,
    title: 'Select Author Image',
    types: ['image']
  };
  
  export const authorImagePreviewChooser = {
    select: '#wdst-author-preview-image button.choose',
    target: '#wdst-author-preview-image input[type="text"]',
    is_multiple: false,
    title: 'Select Author Preview Image',
    types: ['image']
  }  

  export const logoImageChooser = {
    select: '#wdst-header-logo-image button.choose',
    target: '#wdst-header-logo-image input[type="text"]',
    is_multiple: false,
    title: 'Select Logo Image',
    types: ['image']
  }

  export const topBackgroundWebpLgChooser = {
    select: '#wdst-top-bg-img-lg-webp button.choose',
    target: '#wdst-top-bg-img-lg-webp input[type="text"]',
    is_multiple: false,
    title: 'Select Background Image for Desktop [WEBP]',
    types: ['image/webp']
  }

  export const topBackgroundWebpLgReset = {
    button: '#wdst-top-bg-img-lg-webp button.reset',
    target: '#wdst-top-bg-img-lg-webp input'
  };

  export const topBackgroundJpegLgChooser = {
    select: '#wdst-top-bg-img-lg-jpeg button.choose',
    target: '#wdst-top-bg-img-lg-jpeg input[type="text"]',
    is_multiple: false,
    title: 'Select Background Image for Desktop [JPEG]',
    types: ['image/jpeg']
  }

  export const topBackgroundJpegLgReset = {
    button: '#wdst-top-bg-img-lg-jpeg button.reset',
    target: '#wdst-top-bg-img-lg-jpeg input'
  };

  export const topBackgroundWebpXsChooser = {
    select: '#wdst-top-bg-img-xs-webp button.choose',
    target: '#wdst-top-bg-img-xs-webp input[type="text"]',
    is_multiple: false,
    title: 'Select Background Image for Mobile [WEBP]',
    types: ['image/webp']
  }

  export const topBackgroundWebpXsReset = {
    button: '#wdst-top-bg-img-xs-webp button.reset',
    target: '#wdst-top-bg-img-xs-webp input'
  };

  export const topBackgroundJpegXsChooser = {
    select: '#wdst-top-bg-img-xs-jpeg button.choose',
    target: '#wdst-top-bg-img-xs-jpeg input[type="text"]',
    is_multiple: false,
    title: 'Select Background Image for Mobile [JPEG]',
    types: ['image/jpeg']
  }

  export const topBackgroundJpegXsReset = {
    button: '#wdst-top-bg-img-xs-jpeg button.reset',
    target: '#wdst-top-bg-img-xs-jpeg input'
  };