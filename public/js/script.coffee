$ ->
  # Set up click handlers
  $('.primary > .logo'     ).click handleLogoClick
  $('.primary > .logo > a' ).click handleLogoClick
  $('.primary > div:not(.logo):not(.studio) > a').click handleNavClick
  $('.secondary > a'       ).click handleSecondaryNavClick
  $('.product'             ).click handleProductClick
  $('.product_popup .close, #lightbox').click closeProductPopup
  $('.paint_toggle'        ).click handlePaintToggleClick
  $('.about_us'            ).click handleAboutUsClick
  $('.primary .studio a'   ).click handleStudioClick


log = (str) -> console.log str


handleLogoClick = (evt) ->
  clicked = evt.target
  showAllArticles()
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

  # Scroll to top
  $('html, body').animate({
    scrollTop: 0
  }, 500);


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



getOffset = (element) ->
  if element == document.body
    0
  else
    element.offsetTop + getOffset(element.parentNode)


handleProductClick = (evt) ->
  $clicked = if evt.target.nodeName == 'A' then $(evt.target) else $(evt.target).parents('a.product')
  clicked = $clicked.get(0)
  windowOffset = getWindowScrollOffset(clicked)
  openProductPopup $clicked.attr('data-product-id'), clicked.offsetTop, windowOffset


getWindowScrollOffset = (elem) ->
  popupHeight     = 470

  windowTop       = document.body.scrollTop
  windowHeight    = window.innerHeight
  windowBottom    = windowTop + windowHeight

  verticalPadding = windowHeight - popupHeight
  topPadding      = verticalPadding / 2

  popupTop        = getOffset(elem)
  popupBottom     = popupTop + popupHeight

  isFullyVisible  = popupTop > windowTop && popupBottom < windowBottom

  # If the popup will be fully visible, avoid unnecessary scrolling
  if isFullyVisible
    null
  else
    popupTop - topPadding


openProductPopup = (productId, popupOffset, windowOffset) ->
  $('.product_popup.selected').removeClass('selected')
  $('.products').addClass('faded')
  $('#' + productId).css('margin-top', popupOffset + 'px').addClass('selected')
  if windowOffset
    $('body').animate({ scrollTop: windowOffset }, 400)
  $('#lightbox').addClass('active')
  $('.product_popups').removeClass('hidden')
  initExpansionButton($('#' + productId))


closeProductPopup = () ->
  $('.product_popups').addClass('hidden')
  $('.products').removeClass('faded')
  $('#lightbox').removeClass('active')


handlePaintToggleClick = (evt) ->
  $(document.body).toggleClass('disable_paint')


initExpansionButton = (productPopup) ->
  return if ($(productPopup).find('.expand').length > 0)

  article = $(productPopup).find('.article')[0] 
  articleHeight = getArticleHeight(article) #lastChild.clientHeight + lastChild.offsetTop
  if articleHeight > 420
    button = document.createElement('button')
    button.className = 'expand'
    button.innerHTML = 'EXPAND'
    article.appendChild(button)
    $(button).click handleExpand


handleExpand = (evt) ->
  clicked   = evt.target
  $popup    = $(clicked.parentNode.parentNode)
  article   = clicked.parentNode
  articleHeight = getArticleHeight(article)
  if !$popup.hasClass('expanded')
    $(article).css('height', (articleHeight + 100) + 'px')#(lastChild.offsetTop + lastChild.clientHeight - 50) + 'px')
  else
    $(article).css('height', '')
  $popup.css('min-height', (articleHeight + 400) + 'px')
  $popup.toggleClass('expanded')


getArticleHeight = (article) ->
  return article.scrollHeight - 150


handleAboutUsClick = (evt) ->
  evt.preventDefault()
  showArticle(91)


handleStudioClick = (evt) ->
  # log "CICKED MED"
  evt.preventDefault()
  evt.stopPropagation()
  showArticle(97)


showArticle = (articleId) ->
  # Hide every article but the relevant one
  $('.blog_content article:not(#article_' + articleId + ')').addClass('hidden')

  # Scroll to show article
  $('html, body').animate({
    scrollTop: $('#article_' + articleId).offset().top - 110
  }, 500);


showAllArticles = () ->
  $('.blog_content article').removeClass('hidden')
