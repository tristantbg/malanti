<?php if(!defined('KIRBY')) exit ?>

title: Site
fields:
  menuSettings:
    label: Menu Settings
    type: headline
  menuleft:
    label: Menu Left
    type: select 
    required: true
    options: query
    query:
      page: /
      fetch: index
      value: "{{uri}}"
      text: "{{title}}"
    width: 1/2
  menuright:
    label: Menu Right
    type: select 
    required: true
    options: query
    query:
      page: /
      fetch: index
      value: "{{uri}}"
      text: "{{title}}"
    width: 1/2
  generalSettings:
    label: Site Settings
    type: headline
  title:
    label: Title
    type:  text
  logosvg:
    label: Logo SVG
    type: select 
    options: files
    width: 1/2
  logopng:
    label: Logo PNG
    type: image
    width: 1/2
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  customcss:
    label: Custom CSS
    type: textarea
    buttons: false
  googleAnalytics:
    label: Google Analytics ID
    type: text
    icon: code
    help: Tracking ID in the form UA-XXXXXXXX-X. Keep this field empty if you are not using it.
    width: 1/2
  ogimage:
    label: Facebook OpenGraph image
    type: image
    help: 1200x630px minimum
    width: 1/2