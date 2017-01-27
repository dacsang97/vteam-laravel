@extends('hidden.partials.master')
@section('content')
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label">Link bài viết</label>
            <input type="text" value="{{ $link->post_link }}" readonly class="form-control col-sm-10">
        </div>
        <hr>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="checkbox ct-blue <?php if ($is_commented) echo 'checked'; ?>" for="checkbox1" style="padding-top: 0px;">
                    <span class="icons">
                        <span class="first-icon fa fa-square-o"></span>
                        <span class="second-icon fa fa-check-square-o"></span>
                    </span>
                    <input type="checkbox" id="binhluan" name="binhluan" data-toggle="checkbox"> Phải bình luận để xem link </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <label class="checkbox ct-red <?php if ($is_reactioned) echo 'checked'; ?>" for="checkbox1" style="padding-top: 0px;">
                    <span class="icons">
                        <span class="first-icon fa fa-square-o"></span>
                        <span class="second-icon fa fa-check-square-o"></span>
                    </span>
                    <input type="checkbox" id="checkbox1" name="like" data-toggle="checkbox"> Phải like hoặc bất kỳ cảm xúc nào để xem link </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <label class="checkbox ct-green <?php if ($e_comment) echo 'checked'; ?>" for="checkbox1" style="padding-top: 0px;">
                    <span class="icons">
                        <span class="first-icon fa fa-square-o"></span>
                        <span class="second-icon fa fa-check-square-o"></span>
                    </span>
                    <input type="checkbox" id="checkbox1" name="like" data-toggle="checkbox"> Bài viết có ít nhất {{ $link->comments_lock }} comment.
                    <b>(Hiện tại có {{ $comment }} comment.)</b>
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <label class="checkbox ct-orange <?php if ($e_reaction) echo 'checked'; ?>" for="checkbox1" style="padding-top: 0px;">
                    <span class="icons">
                        <span class="first-icon fa fa-square-o"></span>
                        <span class="second-icon fa fa-check-square-o"></span>
                    </span>
                    <input type="checkbox" id="checkbox1" name="like" data-toggle="checkbox"> Bài viết có ít nhất {{ $link->reactions_lock }} reaction.
                    <b>(Hiện tại có {{ $reaction }} reaction.)</b>
                </label>
            </div>
        </div>
        @if ($e_comment && $e_reaction && $is_commented && $is_reactioned)
            <div class="form-group">
                <div class="col-sm-12">
                    <label class="control-label">Link đã mở khóa</label>
                    <input type="text" value="{{ $link->hide_link }}" readonly class="form-control col-sm-10">
                </div>
            </div>
        @endif
    </div>
    <script>
        !function ($) {

            /* CHECKBOX PUBLIC CLASS DEFINITION
             * ============================== */

            var Checkbox = function (element, options) {
                this.init(element, options);
            }

            Checkbox.prototype = {

                constructor: Checkbox

                , init: function (element, options) {
                    var $el = this.$element = $(element)

                    this.options = $.extend({}, $.fn.checkbox.defaults, options);
                    $el.before(this.options.template);
                    this.setState();
                }

                , setState: function () {
                    var $el = this.$element
                        , $parent = $el.closest('.checkbox');

                    $el.prop('disabled') && $parent.addClass('disabled');
                    $el.prop('checked') && $parent.addClass('checked');
                }

                , toggle: function () {
                    var ch = 'checked'
                        , $el = this.$element
                        , $parent = $el.closest('.checkbox')
                        , checked = $el.prop(ch)
                        , e = $.Event('toggle')

                    if ($el.prop('disabled') == false) {
                        $parent.toggleClass(ch) && checked ? $el.removeAttr(ch) : $el.prop(ch, ch);
                        $el.trigger(e).trigger('change');
                    }
                }

                , setCheck: function (option) {
                    var d = 'disabled'
                        , ch = 'checked'
                        , $el = this.$element
                        , $parent = $el.closest('.checkbox')
                        , checkAction = option == 'check' ? true : false
                        , e = $.Event(option)

                    $parent[checkAction ? 'addClass' : 'removeClass' ](ch) && checkAction ? $el.prop(ch, ch) : $el.removeAttr(ch);
                    $el.trigger(e).trigger('change');
                }

            }


            /* CHECKBOX PLUGIN DEFINITION
             * ======================== */

            var old = $.fn.checkbox

            $.fn.checkbox = function (option) {
                return this.each(function () {
                    var $this = $(this)
                        , data = $this.data('checkbox')
                        , options = $.extend({}, $.fn.checkbox.defaults, $this.data(), typeof option == 'object' && option);
                    if (!data) $this.data('checkbox', (data = new Checkbox(this, options)));
                    if (option == 'toggle') data.toggle()
                    if (option == 'check' || option == 'uncheck') data.setCheck(option)
                    else if (option) data.setState();
                });
            }

            $.fn.checkbox.defaults = {
                template: '<span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span>'
            }


            /* CHECKBOX NO CONFLICT
             * ================== */

            $.fn.checkbox.noConflict = function () {
                $.fn.checkbox = old;
                return this;
            }


            /* CHECKBOX DATA-API
             * =============== */

            $(document).on('click.checkbox.data-api', '[data-toggle^=checkbox], .checkbox', function (e) {
                var $checkbox = $(e.target);
                if (e.target.tagName != "A") {
                    e && e.preventDefault() && e.stopPropagation();
                    if (!$checkbox.hasClass('checkbox')) $checkbox = $checkbox.closest('.checkbox');
                    $checkbox.find(':checkbox').checkbox('toggle');
                }
            });

            $(function () {
                $('[data-toggle="checkbox"]').each(function () {
                    var $checkbox = $(this);
                    $checkbox.checkbox();
                });
            });

        }(window.jQuery);
    </script>
@endsection