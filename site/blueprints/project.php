<?php if(!defined('KIRBY')) exit ?>

title: Project
files: true
pages: false
files:
  fields:
    contentsize:
      label: Size
      type: radio
      columns: 1
      options:
        fitwidth: Fit width
        fitheight: Fit height
        half: 50%
      width: 1/2
    contentposition:
      label: Position
      type: radio
      columns: 1
      options:
        left: Left
        right: Right
      width: 1/2
    caption:
      label: Caption
      type: textarea
fields:
  prevnext: prevnext
  title:
    label: Title
    type:  text
    width: 3/4
  date:
    label: Year
    type:  date
    format: YYYY
    width: 1/4
  featured:
    label: Featured image
    type: image
    width: 1/3
  text:
    label: Description
    type: textarea
  medias: 
    label: Images
    type: gallery