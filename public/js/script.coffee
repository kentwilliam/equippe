$ ->
  # Set up click handlers
  $('.primary > .logo > a'         ).click handleLogoClick
  $('.primary > div:not(.logo) > a').click handleNavClick
  $('.secondary > a'               ).click handleSecondaryNavClick
  $('.product'                     ).click handleProductClick
  $('.product_popup .close'        ).click closeProductPopup

  # # Initialize submenus
  # $('.secondary').each (i, secondaryNav) ->
  #   secondaryNav.style.left = ((i + 1) * 160) + 'px'


log = (str) -> console.log str


handleLogoClick = (evt) ->
  clicked = evt.target

  return if $('.page_container').hasClass('home')

  $('nav.primary .selected').removeClass('selected')
  $('.page_container').addClass 'home'


handleNavClick = (evt) ->
  clicked = evt.target.parentNode

  # Select/unselect menu items
  $('nav.primary .selected').removeClass('selected')
  $(clicked.parentNode).addClass('selected')

  # Hide/unhide products
  groupId = $(clicked).attr 'data-group-id'
  $('.products').addClass('hidden')
  $('.product_popups').addClass('hidden')
  setTimeout( -> 
    $('.products > a').each (i, productLink) ->
      isInGroup = $(productLink).hasClass('group' + groupId)
      if isInGroup
        $(productLink).removeClass('hidden')
      else
        $(productLink).addClass('hidden')
    $('.products').removeClass('hidden')
  , 500)
  
  if $('.page_container').hasClass('home')
    $('.page_container').removeClass 'home'


handleSecondaryNavClick = (evt) ->
  clicked = evt.target.parentNode

  # Select/unselect menu items
  $('.selected nav.secondary .selected').removeClass('selected')
  $(clicked).addClass('selected')

  # Hide/unhide products
  subgroupId = $(clicked).attr 'data-subgroup-id'

  $('.products').addClass('hidden')
  $('.product_popups').addClass('hidden')
  setTimeout( () -> 
    $('.products > a').each (i, productLink) ->
      isInGroup = $(productLink).hasClass('subgroup' + subgroupId)
      if isInGroup
        $(productLink).removeClass('hidden')
      else
        $(productLink).addClass('hidden')
    $('.products').removeClass('hidden')
  , 500)


handleProductClick = (evt) ->
  clicked = if evt.target.nodeName == 'A' then $(evt.target) else $(evt.target).parents('a.product')
  openProductPopup clicked.attr('data-product-id')


openProductPopup = (productId) ->
  $('.product_popup.selected').removeClass('selected')
  $('.products').addClass('hidden')
  $('.product_popups').removeClass('hidden')
  $('#' + productId).addClass('selected')


closeProductPopup = () ->
  $('.product_popups').addClass('hidden')
  $('.products').removeClass('hidden')



