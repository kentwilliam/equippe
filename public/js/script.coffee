$ ->
  # Set up click handlers
  $('.primary > .logo > a'         ).click handleLogoClick
  $('.primary > div:not(.logo) > a').click handleNavClick
  $('.secondary > a'               ).click handleSecondaryNavClick
  $('.product'                     ).click handleProductClick
  $('.product_popup .close'        ).click closeProductPopup
  $('.paint_toggle'                ).click handlePaintToggleClick

  initExpansionButtons()
  # # Initialize submenus
  # $('.secondary').each (i, secondaryNav) ->
  #   secondaryNav.style.left = ((i + 1) * 160) + 'px'


log = (str) -> console.log str


handleLogoClick = (evt) ->
  clicked = evt.target

  return if $('.page_container').hasClass('home')

  closeProductPopup();

  setTimeout( ->
    $('.primary > .logo').removeClass('reappear')
  , 400)

  $('nav.primary .selected').removeClass('selected')
  $('.page_container').addClass 'home'


handleNavClick = (evt) ->
  clicked = evt.target
  clicked = clicked.parentNode if (clicked.nodeName == 'SPAN')

  # Select/unselect menu items
  $('nav.primary .selected').removeClass('selected')
  $(clicked).addClass('selected')

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
  
  # Moving away from home page?
  if $('.page_container').hasClass('home')
    $('.page_container').removeClass 'home'
    setTimeout( ->
      $('.primary > .logo').addClass('reappear')
    , 1000)


handleSecondaryNavClick = (evt) ->
  clicked = evt.target
  clicked = clicked.parentNode if (clicked.nodeName == 'SPAN')

  # Select/unselect menu items
  $('nav.secondary .selected').removeClass('selected')
  $(clicked).addClass('selected')

  # Hide/unhide products
  subgroupId = $(clicked).attr 'data-subgroup-id'

  $('.products').addClass('hidden')
  $('.product_popups').addClass('hidden')
  setTimeout( -> 
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
  openProductPopup clicked.attr('data-product-id'), clicked


openProductPopup = (productId, productElem) ->
  $('.product_popup.selected').removeClass('selected')
  $('.products').addClass('hidden')
  $('#' + productId).css('margin-top', productElem.get(0).offsetTop + 'px').addClass('selected')
  $('.product_popups').removeClass('hidden')


closeProductPopup = () ->
  $('.product_popups').addClass('hidden')
  $('.products').removeClass('hidden')


handlePaintToggleClick = (evt) ->
  $(document.body).toggleClass('disable_paint')


# Insert buttons for the popup articles where it's necessary
initExpansionButtons = ->
  articles = $('.product_popup .article')
  articles.each (i, elem) ->
    if elem.children.length > 0
      lastChild = elem.children[elem.children.length - 1]
      articleHeight = lastChild.clientHeight + lastChild.offsetTop
      if articleHeight > 230
        insertExpansionButton elem
  # Attach click events to buttons
  $('.product_popup .expand').click (evt) ->
    clicked   = evt.target
    $popup    = $(clicked.parentNode.parentNode)
    article   = clicked.parentNode
    #lastChild = article.children.length > 1 && article.children[article.children.length - 2]
    log 'height: ' + getArticleHeight(article)
    articleHeight = getArticleHeight(article)
    if !$popup.hasClass('expanded')
      $(article).css('height', (articleHeight + 100) + 'px')#(lastChild.offsetTop + lastChild.clientHeight - 50) + 'px')
    else
      $(article).css('height', '')
    $popup.css('min-height', (articleHeight + 400) + 'px')
    $popup.toggleClass('expanded')


insertExpansionButton = (article) ->
  button = document.createElement('button')
  button.className = 'expand'
  button.innerHTML = 'EXPAND'
  article.appendChild(button)


getArticleHeight = (article) ->
  lastChild = article.children.length > 0 && article.children[article.children.length - 1]
  if lastChild.nodeName == 'BUTTON'
    lastChild = article.children.length > 1 && article.children[article.children.length - 2]
  return lastChild.offsetTop + lastChild.clientHeight
