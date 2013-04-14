log = (str) -> console.log str

handleNavClick = (evt) ->
  clicked = evt.target

  # Select/unselect menu items
  $('nav.primary .selected').removeClass('selected')
  $(evt.target.parentNode).addClass('selected')

  # Hide/unhide correct products
  groupId = $(clicked).attr 'data-group-id'

  $('.products').addClass('hidden')
  setTimeout( -> 
    $('.products > a').each (i, productLink) ->
      isInGroup = $(productLink).hasClass('group' + groupId)
      if isInGroup
        $(productLink).removeClass('hidden')
      else
        $(productLink).addClass('hidden')
    $('.products').removeClass('hidden')
  , 500)
  
  if $('.page_container').hasClass('home') || $(clicked.parentNode).hasClass('logo')
    $('.page_container').toggleClass 'home'

handleSecondaryNavClick = (evt) ->
  console.log('happened')

$ ->
  $('.primary > div > a').each (i, navItem) ->
    $(navItem).on 'click', handleNavClick

  $('.secondary > a').each (i, secondaryNavItem) ->
    $(secondaryNavItem).on 'click', handleSecondaryNavClick

  $('.secondary').each (i, secondaryNav) ->
    secondaryNav.style.left = ((i + 1) * 160) + 'px'

  # $subnavigationLinks = $('.secondary a')
  # $subnavigationLinks.each (i, elem) ->
  #   elem.
  #document.body.addEventListener 'click', handleClick

