<?php if(!defined('KIRBY')) exit ?>

title: About
pages:
  template: section
files: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text for SEO
    type:  textarea
  news:
    label: News
    type: structure
    style: table
    fields:
      newscontent:
        label: News content
        type: textarea
  contact:
    label: Contact
    type:  textarea
