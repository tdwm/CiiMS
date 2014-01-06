;
define('tpl/media/appmsg_edit/first_appmsg.html.js', [], function(require, exports, module) {return "<div id=\"appmsgItem{id}\" data-fileId=\"{file_id}\" data-id=\"{id}\" class=\"js_appmsg_item {if cover}has_thumb{\/if}\">\r\n    {if isMul}\r\n        <div class=\"appmsg_info\">\r\n            <em class=\"appmsg_date\">{create_time}<\/em>\r\n        <\/div>\r\n        <div class=\"cover_appmsg_item\">\r\n            <h4 class=\"appmsg_title\"><a href=\"javascript:void(0);\" onclick=\"return false;\" target=\"_blank\">{title || '\u6807\u9898'}<\/a><\/h4>\r\n            <div class=\"appmsg_thumb_wrp\">\r\n                <img class=\"js_appmsg_thumb appmsg_thumb\" src=\"{cover}\">\r\n                <i class=\"appmsg_thumb default\">\u5c01\u9762\u56fe\u7247<\/i>\r\n            <\/div>\r\n            <div class=\"appmsg_edit_mask\">\r\n                <a onclick=\"return false;\" class=\"icon18_common edit_gray js_edit\" data-id=\"{id}\" href=\"javascript:;\">\u7f16\u8f91<\/a>\r\n            <\/div>\r\n        <\/div>\r\n    {else}\r\n        <h4 class=\"appmsg_title\"><a onclick=\"return false;\" href=\"javascript:void(0);\" target=\"_blank\">{title || '\u6807\u9898'}<\/a><\/h4>\r\n        <div class=\"appmsg_info\">\r\n            <em class=\"appmsg_date\">{create_time}<\/em>\r\n        <\/div>\r\n        <div class=\"appmsg_thumb_wrp\">\r\n            <img class=\"js_appmsg_thumb appmsg_thumb\" src=\"{cover}\">\r\n            <i class=\"appmsg_thumb default\">\u5c01\u9762\u56fe\u7247<\/i>\r\n        <\/div>\r\n        <p class=\"appmsg_desc\">{=digest.html(true)}<\/p>\r\n    {\/if}\r\n<\/div>\r\n";});
define("tpl/simplePopup.html.js", [], function(e, t, n) {
    return '<div class="simple_dialog_content">\r\n    <form id="popupForm_{id}"  method="post"  class="form" onSubmit="return false;">\r\n         <div class="frm_control_group">\r\n            {if label}<label class="frm_label">{label}</label>{/if}\r\n            <span class="frm_input_box">\r\n                <input type="text" class="frm_input" name="popInput" value="{value}"/>\r\n                <input style="display:none"/>\r\n            </span>\r\n            {if tips}<p class="frm_tips">{tips}</p>{/if}\r\n        </div>       \r\n        <div class="js_verifycode"></div>\r\n    </form>\r\n</div>\r\n';
});
define("common/wx/top.js", [ "tpl/top.html.js" ], function(e, t, n) {
    "use strict";
    function r(e, t, n) {
        var r = this;
        return this.dom = $(e), this.dom.addClass("title_tab"), t && typeof t == "string" && (t = [ {
            name: "",
               url: "javasript:;",
               className: "selected"
        } ]), $.each(t, function(e, t) {
            t.url = t.url && [ t.url, wx.data.param ].join("") || "javasript:;";
        }), this.dom.html(template.compile(i)({
            data: t
        })), n && n.render && typeof n.render == "function" ? $.each(this.dom.find("li"), function(e, r) {
            n.render.apply($(r), [ t[e], n && n.data ]);
        }) : this.dom.html(template.compile(i)({
            data: t
        })), this.dom.on("click", ".top_item", function() {
            $(this).addClass("selected").siblings().removeClass("selected");
        }), this;
    }
    var i = e("tpl/top.html.js"), s = wx.acl;
    r.prototype.selected = function(e) {
        typeof e == "number" ? this.dom.find(".js_top:eq(" + e + ")").addClass("selected") : this.dom.find(".js_top[data-id=" + e + "]").addClass("selected");
    }, r.DATA = {
        setting: [ {
            id: "info",
            name: "账号信息",
            url: "/cgi-bin/userinfopage?t=wxm-setting"
        }, {
            id: "assistant",
            name: "公众号手机助手",
            url: "/cgi-bin/userinfopage?t=wxm_setting_bindaccount"
        }, {
            id: "meeting",
            name: "会议号设置",
            url: "/cgi-bin/userinfopage?t=wxm-meeting-setting"
        } ],
        mass: [ {
            id: "send",
            name: "新建群发消息",
            url: "/cgi-bin/masssendpage?t=mass/send"
        }, {
            id: "list",
            name: "已发送",
            url: "/cgi-bin/masssendpage?t=mass/list&action=history&begin=0&count=10"
        } ],
        message: [ {
            id: "total",
            name: "全部消息",
            url: "/cgi-bin/message?t=message/list&count=20&day=7"
        }, {
            id: "today",
            name: "今天",
            url: "/cgi-bin/message?t=message/list&count=20&day=0",
            className: "sub"
        }, {
            id: "yesterday",
            name: "昨天",
            url: "/cgi-bin/message?t=message/list&count=20&day=1",
            className: "sub"
        }, {
            id: "beforeYesterday",
            name: "前天",
            url: "/cgi-bin/message?t=message/list&count=20&day=2",
            className: "sub"
        }, {
            id: "fivedays",
            name: "更早",
            url: "/cgi-bin/message?t=message/list&count=20&day=3",
            className: "sub"
        }, {
            id: "star",
            name: "星标消息",
            url: "/cgi-bin/message?t=message/list&count=20&action=star"
        }, {
            id: "search",
            name: "搜索结果"
        } ],
        media: [ {
            id: "media11",
            name: "商品消息",
            acl: s.msg_acl.can_commodity_app_msg,
            url: "/cgi-bin/appmsg?begin=0&count=10&t=media/appmsg_list&type=11&action=list"
        }, {
            id: "media10",
            name: "图文消息",
            acl: s.msg_acl.can_app_msg,
            url: "/cgi-bin/appmsg?begin=0&count=10&t=media/appmsg_list&type=10&action=list"
        }, {
            id: "media2",
            name: "图片",
            acl: s.msg_acl.can_image_msg,
            url: "/cgi-bin/filepage?type=2&begin=0&count=10&t=media/list"
        }, {
            id: "media3",
            name: "语音",
            acl: s.msg_acl.can_voice_msg,
            url: "/cgi-bin/filepage?type=3&begin=0&count=10&t=media/list"
        }, {
            id: "media15",
            name: "视频",
            acl: s.msg_acl.can_video_msg,
            url: "/cgi-bin/appmsg?begin=0&count=10&t=media/appmsg_list&type=15&action=list"
        } ],
        advanced: [ {
            id: "edit",
            name: "编辑模式",
            url: "/cgi-bin/advanced?action=edit&t=advanced/edit"
        }, {
            id: "dev",
            name: "开发模式",
            url: "/cgi-bin/advanced?action=dev&t=advanced/dev"
        } ],
        business: [ {
            id: "overview",
            name: "数据概览",
            url: "/cgi-bin/business?t=business/overview&action=overview"
        }, {
            id: "source",
            name: "流量来源",
            url: "/cgi-bin/business?t=business/source&action=source"
        }, {
            id: "rank",
            name: "流量排名",
            url: "/cgi-bin/business?t=business/rank&action=rank"
        }, {
            id: "order",
            name: "订单流水",
            url: "/cgi-bin/business?t=business/order&action=order"
        }, {
            id: "info",
            name: "商户信息",
            url: "/cgi-bin/business?t=business/info&action=info"
        }, {
            id: "test",
            name: "支付测试",
            url: "/cgi-bin/business?t=business/whitelist&action=whitelist"
        }, {
            id: "course",
            name: "使用教程",
            url: "/cgi-bin/business?t=business/course&action=course"
        } ],
        user: [ {
            id: "useradmin",
            name: "用户管理",
            url: "/cgi-bin/contactmanage?t=user/index&pagesize=10&pageidx=0&type=0&groupid=0"
        } ],
        statistics: {
            user: [ {
                id: "summary",
                name: "用户增长",
                url: "/cgi-bin/pluginloginpage?action=stat_user_summary&pluginid=luopan&t=statistics/index"
            }, {
                id: "attr",
                name: "用户属性",
                url: "/cgi-bin/pluginloginpage?action=stat_user_attr&pluginid=luopan&t=statistics/index"
            } ],
            article: [ {
                id: "detail",
                name: "图文群发",
                url: "/cgi-bin/pluginloginpage?action=stat_article_detail&pluginid=luopan&t=statistics/index"
            }, {
                id: "analyse",
                name: "图文统计",
                url: "/cgi-bin/pluginloginpage?action=stat_article_analyse&pluginid=luopan&t=statistics/index"
            } ],
            message: [ {
                id: "message",
                name: "消息分析",
                url: "/cgi-bin/pluginloginpage?action=stat_message&pluginid=luopan&t=statistics/index"
            } ],
            "interface": [ {
                id: "interface",
                name: "接口分析",
                url: "/cgi-bin/pluginloginpage?action=stat_interface&pluginid=luopan&t=statistics/index"
            } ]
        },
        notification: [ {
            id: "notification",
            name: "通知中心",
            url: "/cgi-bin/frame?t=notification/index_frame"
        } ],
        templateMessage: [ {
            id: "my_template",
            name: "我的模板",
            url: "/cgi-bin/tmplmsg?action=list&t=tmplmsg/list"
        }, {
            id: "template_message",
            name: "模板库",
            url: "/cgi-bin/tmplmsg?action=tmpl_store&t=tmplmsg/store"
        } ],
        assistant: [ {
            id: "mphelper",
            name: "公众号助手",
            url: "/cgi-bin/assistant?t=setting/mphelper&action=mphelper"
        }, {
            id: "warning",
            name: "接口告警",
            url: "/cgi-bin/assistant?t=setting/warning&action=warning"
        } ]
    }, r.RENDER = {
        setting: function(e, t) {
            e.id == "meeting" && t.role != 15 && this.remove();
        },
        message: function(e, t) {
            e.id == "search" && (!t || t.action != "search") && this.remove();
        },
        assistant: function(e, t) {
            e.id == "warning" && (!t || t.have_service_package == 0) && this.remove();
        }
    }, n.exports = r;
});
define("common/lib/jquery.validate.js", [], function(e, t, n) {
    function i(e, t, n) {
        return $.validator.methods[e].call(r, t, null, n);
    }
    (function(e) {
        e.extend(e.fn, {
            validate: function(t) {
                if (!this.length) {
                    t && t.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing.");
                    return;
                }
                var n = e.data(this[0], "validator");
                return n ? n : (this.attr("novalidate", "novalidate"), n = new e.validator(t, this[0]), e.data(this[0], "validator", n), n.settings.onsubmit && (this.validateDelegate(":submit", "click", function(t) {
                    n.settings.submitHandler && (n.submitButton = t.target), e(t.target).hasClass("cancel") && (n.cancelSubmit = !0), e(t.target).attr("formnovalidate") !== undefined && (n.cancelSubmit = !0);
                }), this.submit(function(t) {
                    function r() {
                        var r;
                        return n.settings.submitHandler ? (n.submitButton && (r = e("<input type='hidden'/>").attr("name", n.submitButton.name).val(e(n.submitButton).val()).appendTo(n.currentForm)), n.settings.submitHandler.call(n, n.currentForm, t), n.submitButton && r.remove(), !1) : !0;
                    }
                    return n.settings.debug && t.preventDefault(), n.cancelSubmit ? (n.cancelSubmit = !1, r()) : n.form() ? n.pendingRequest ? (n.formSubmitted = !0, !1) : r() : (n.focusInvalid(), !1);
                })), n);
            },
            valid: function() {
                if (e(this[0]).is("form")) return this.validate().form();
                var t = !0, n = e(this[0].form).validate();
                return this.each(function() {
                    t = t && n.element(this);
                }), t;
            },
            removeAttrs: function(t) {
                var n = {}, r = this;
                return e.each(t.split(/\s/), function(e, t) {
                    n[t] = r.attr(t), r.removeAttr(t);
                }), n;
            },
            rules: function(t, n) {
                var r = this[0];
                if (t) {
                    var i = e.data(r.form, "validator").settings, s = i.rules, o = e.validator.staticRules(r);
                    switch (t) {
                        case "add":
                            e.extend(o, e.validator.normalizeRule(n)), delete o.messages, s[r.name] = o, n.messages && (i.messages[r.name] = e.extend(i.messages[r.name], n.messages));
                            break;
                        case "remove":
                            if (!n) return delete s[r.name], o;
                            var u = {};
                            return e.each(n.split(/\s/), function(e, t) {
                                u[t] = o[t], delete o[t];
                            }), u;
                    }
                }
                var a = e.validator.normalizeRules(e.extend({}, e.validator.classRules(r), e.validator.attributeRules(r), e.validator.dataRules(r), e.validator.staticRules(r)), r);
                if (a.required) {
                    var f = a.required;
                    delete a.required, a = e.extend({
                        required: f
                    }, a);
                }
                return a;
            }
        }), e.extend(e.expr[":"], {
            blank: function(t) {
                return !e.trim("" + e(t).val());
            },
        filled: function(t) {
            return !!e.trim("" + e(t).val());
        },
        unchecked: function(t) {
            return !e(t).prop("checked");
        }
        }), e.validator = function(t, n) {
            this.settings = e.extend(!0, {}, e.validator.defaults, t), this.currentForm = n, this.init();
        }, e.validator.format = function(t, n) {
            return arguments.length === 1 ? function() {
                var n = e.makeArray(arguments);
                return n.unshift(t), e.validator.format.apply(this, n);
            } : (arguments.length > 2 && n.constructor !== Array && (n = e.makeArray(arguments).slice(1)), n.constructor !== Array && (n = [ n ]), e.each(n, function(e, n) {
                t = t.replace(new RegExp("\\{" + e + "\\}", "g"), function() {
                    return n;
                });
            }), t);
        }, e.extend(e.validator, {
            defaults: {
                messages: {},
            groups: {},
            rules: {},
            errorClass: "error",
            validClass: "valid",
            errorElement: "label",
            focusInvalid: !0,
            errorContainer: e([]),
            errorLabelContainer: e([]),
            onsubmit: !0,
            ignore: ":hidden",
            ignoreTitle: !1,
            onfocusin: function(e, t) {
                this.lastActive = e, this.settings.focusCleanup && !this.blockFocusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, e, this.settings.errorClass, this.settings.validClass), this.addWrapper(this.errorsFor(e)).hide());
            },
            onfocusout: function(t, n) {
                e(t).valid();
            },
            onkeyup: function(e, t) {
                if (t.which === 9 && this.elementValue(e) === "") return;
                (e.name in this.submitted || e === this.lastElement) && this.element(e);
            },
            onclick: function(e, t) {
                e.name in this.submitted ? this.element(e) : e.parentNode.name in this.submitted && this.element(e.parentNode);
            },
            highlight: function(t, n, r) {
                t.type === "radio" ? this.findByName(t.name).addClass(n).removeClass(r) : e(t).addClass(n).removeClass(r);
            },
            unhighlight: function(t, n, r) {
                t.type === "radio" ? this.findByName(t.name).removeClass(n).addClass(r) : e(t).removeClass(n).addClass(r);
            }
            },
            setDefaults: function(t) {
                e.extend(e.validator.defaults, t);
            },
            messages: {
                required: "This field is required.",
                remote: "Please fix this field.",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Please enter a valid date.",
                dateISO: "Please enter a valid date (ISO).",
                number: "Please enter a valid number.",
                digits: "Please enter only digits.",
                creditcard: "Please enter a valid credit card number.",
                equalTo: "Please enter the same value again.",
                maxlength: e.validator.format("Please enter no more than {0} characters."),
                minlength: e.validator.format("Please enter at least {0} characters."),
                rangelength: e.validator.format("Please enter a value between {0} and {1} characters long."),
                range: e.validator.format("Please enter a value between {0} and {1}."),
                max: e.validator.format("Please enter a value less than or equal to {0}."),
                min: e.validator.format("Please enter a value greater than or equal to {0}.")
            },
            autoCreateRanges: !1,
            prototype: {
                init: function() {
                    function r(t) {
                        var n = e.data(this[0].form, "validator"), r = "on" + t.type.replace(/^validate/, "");
                        n.settings[r] && n.settings[r].call(n, this[0], t);
                    }
                    this.labelContainer = e(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || e(this.currentForm), this.containers = e(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset();
                    var t = this.groups = {};
                    e.each(this.settings.groups, function(n, r) {
                        typeof r == "string" && (r = r.split(/\s/)), e.each(r, function(e, r) {
                            t[r] = n;
                        });
                    });
                    var n = this.settings.rules;
                    e.each(n, function(t, r) {
                        n[t] = e.validator.normalizeRule(r);
                    }), e(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'] ", "focusin focusout keyup", r).validateDelegate("[type='radio'], [type='checkbox'], select, option", "click", r), this.settings.invalidHandler && e(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler);
                },
                form: function() {
                    return this.checkForm(), e.extend(this.submitted, this.errorMap), this.invalid = e.extend({}, this.errorMap), this.valid() || e(this.currentForm).triggerHandler("invalid-form", [ this ]), this.showErrors(), this.valid();
                },
                checkForm: function() {
                    this.prepareForm();
                    for (var e = 0, t = this.currentElements = this.elements(); t[e]; e++) this.check(t[e]);
                    return this.valid();
                },
                element: function(t) {
                    t = this.validationTargetFor(this.clean(t)), this.lastElement = t, this.prepareElement(t), this.currentElements = e(t);
                    var n = this.check(t) !== !1;
                    return n ? delete this.invalid[t.name] : this.invalid[t.name] = !0, this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), n;
                },
                showErrors: function(t) {
                    if (t) {
                        e.extend(this.errorMap, t), this.errorList = [];
                        for (var n in t) this.errorList.push({
                            message: t[n],
                            element: this.findByName(n)[0]
                        });
                        this.successList = e.grep(this.successList, function(e) {
                            return !(e.name in t);
                        });
                    }
                    this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors();
                },
                resetForm: function() {
                    e.fn.resetForm && e(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass).removeData("previousValue");
                },
                numberOfInvalids: function() {
                    return this.objectLength(this.invalid);
                },
                objectLength: function(e) {
                    var t = 0;
                    for (var n in e) t++;
                    return t;
                },
                hideErrors: function() {
                    this.addWrapper(this.toHide).hide();
                },
                valid: function() {
                    return this.size() === 0;
                },
                size: function() {
                    return this.errorList.length;
                },
                focusInvalid: function() {
                    if (this.settings.focusInvalid) try {
                        e(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin");
                    } catch (t) {}
                },
                findLastActive: function() {
                    var t = this.lastActive;
                    return t && e.grep(this.errorList, function(e) {
                        return e.element.name === t.name;
                    }).length === 1 && t;
                },
                elements: function() {
                    var t = this, n = {};
                    return e(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function() {
                        return !this.name && t.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in n || !t.objectLength(e(this).rules()) ? !1 : (n[this.name] = !0, !0);
                    });
                },
                clean: function(t) {
                    return e(t)[0];
                },
                errors: function() {
                    var t = this.settings.errorClass.replace(" ", ".");
                    return e(this.settings.errorElement + "." + t, this.errorContext);
                },
                reset: function() {
                    this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = e([]), this.toHide = e([]), this.currentElements = e([]);
                },
                prepareForm: function() {
                    this.reset(), this.toHide = this.errors().add(this.containers);
                },
                prepareElement: function(e) {
                    this.reset(), this.toHide = this.errorsFor(e);
                },
                elementValue: function(t) {
                    var n = e(t).attr("type"), r = e(t).val();
                    return n === "radio" || n === "checkbox" ? e("input[name='" + e(t).attr("name") + "']:checked").val() : typeof r == "string" ? r.replace(/\r/g, "") : r;
                },
                check: function(t) {
                    t = this.validationTargetFor(this.clean(t));
                    var n = e(t).rules(), r = !1, i = this.elementValue(t), s;
                    for (var o in n) {
                        var u = {
                            method: o,
                            parameters: n[o]
                        };
                        try {
                            s = e.validator.methods[o].call(this, i, t, u.parameters);
                            if (s === "dependency-mismatch") {
                                r = !0;
                                continue;
                            }
                            r = !1;
                            if (s === "pending") {
                                this.toHide = this.toHide.not(this.errorsFor(t));
                                return;
                            }
                            if (!s) return this.formatAndAdd(t, u), !1;
                        } catch (a) {
                            throw this.settings.debug && window.console && console.log("Exception occurred when checking element " + t.id + ", check the '" + u.method + "' method.", a), a;
                        }
                    }
                    if (r) return;
                    return this.objectLength(n) && this.successList.push(t), !0;
                },
                customDataMessage: function(t, n) {
                    return e(t).data("msg-" + n.toLowerCase()) || t.attributes && e(t).attr("data-msg-" + n.toLowerCase());
                },
                customMessage: function(e, t) {
                    var n = this.settings.messages[e];
                    return n && (n.constructor === String ? n : n[t]);
                },
                findDefined: function() {
                    for (var e = 0; e < arguments.length; e++) if (arguments[e] !== undefined) return arguments[e];
                    return undefined;
                },
                defaultMessage: function(t, n) {
                    return this.findDefined(this.customMessage(t.name, n), this.customDataMessage(t, n), !this.settings.ignoreTitle && t.title || undefined, e.validator.messages[n], "<strong>Warning: No message defined for " + t.name + "</strong>");
                },
                formatAndAdd: function(t, n) {
                    var r = this.defaultMessage(t, n.method), i = /\$?\{(\d+)\}/g;
                    typeof r == "function" ? r = r.call(this, n.parameters, t) : i.test(r) && (r = e.validator.format(r.replace(i, "{$1}"), n.parameters)), this.errorList.push({
                        message: r,
                           element: t
                    }), this.errorMap[t.name] = r, this.submitted[t.name] = r;
                },
                addWrapper: function(e) {
                    return this.settings.wrapper && (e = e.add(e.parent(this.settings.wrapper))), e;
                },
                defaultShowErrors: function() {
                    var e, t;
                    for (e = 0; this.errorList[e]; e++) {
                        var n = this.errorList[e];
                        this.settings.highlight && this.settings.highlight.call(this, n.element, this.settings.errorClass, this.settings.validClass), this.showLabel(n.element, n.message);
                    }
                    this.errorList.length && (this.toShow = this.toShow.add(this.containers));
                    if (this.settings.success) for (e = 0; this.successList[e]; e++) this.showLabel(this.successList[e]);
                    if (this.settings.unhighlight) for (e = 0, t = this.validElements(); t[e]; e++) this.settings.unhighlight.call(this, t[e], this.settings.errorClass, this.settings.validClass);
                    this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show();
                },
                validElements: function() {
                    return this.currentElements.not(this.invalidElements());
                },
                invalidElements: function() {
                    return e(this.errorList).map(function() {
                        return this.element;
                    });
                },
                showLabel: function(t, n) {
                    var r = this.errorsFor(t);
                    r.length ? (r.removeClass(this.settings.validClass).addClass(this.settings.errorClass), r.html(n)) : (r = e("<" + this.settings.errorElement + ">").attr("for", this.idOrName(t)).addClass(this.settings.errorClass).html(n || ""), this.settings.wrapper && (r = r.hide().show().wrap("<" + this.settings.wrapper + " class='frm_msg fail'/>").parent().prepend("<i>●</i>")), this.labelContainer.append(r).length || (this.settings.errorPlacement ? this.settings.errorPlacement(r, e(t)) : r.insertAfter(t))), !n && this.settings.success && (r.text(""), typeof this.settings.success == "string" ? r.addClass(this.settings.success) : this.settings.success(r, t)), this.toShow = this.toShow.add(r);
                },
                errorsFor: function(t) {
                    var n = this.idOrName(t);
                    return this.errors().filter(function() {
                        return e(this).attr("for") === n;
                    });
                },
                idOrName: function(e) {
                    return this.groups[e.name] || (this.checkable(e) ? e.name : e.id || e.name);
                },
                validationTargetFor: function(e) {
                    return this.checkable(e) && (e = this.findByName(e.name).not(this.settings.ignore)[0]), e;
                },
                checkable: function(e) {
                    return /radio|checkbox/i.test(e.type);
                },
                findByName: function(t) {
                    return e(this.currentForm).find("[name='" + t + "']");
                },
                getLength: function(t, n) {
                    switch (n.nodeName.toLowerCase()) {
                        case "select":
                            return e("option:selected", n).length;
                        case "input":
                            if (this.checkable(n)) return this.findByName(n.name).filter(":checked").length;
                    }
                    return t.length;
                },
                depend: function(e, t) {
                    return this.dependTypes[typeof e] ? this.dependTypes[typeof e](e, t) : !0;
                },
                dependTypes: {
                    "boolean": function(e, t) {
                        return e;
                    },
                    string: function(t, n) {
                        return !!e(t, n.form).length;
                    },
                    "function": function(e, t) {
                        return e(t);
                    }
                },
                optional: function(t) {
                    var n = this.elementValue(t);
                    return !e.validator.methods.required.call(this, n, t) && "dependency-mismatch";
                },
                startRequest: function(e) {
                    this.pending[e.name] || (this.pendingRequest++, this.pending[e.name] = !0);
                },
                stopRequest: function(t, n) {
                    this.pendingRequest--, this.pendingRequest < 0 && (this.pendingRequest = 0), delete this.pending[t.name], n && this.pendingRequest === 0 && this.formSubmitted && this.form() ? (e(this.currentForm).submit(), this.formSubmitted = !1) : !n && this.pendingRequest === 0 && this.formSubmitted && (e(this.currentForm).triggerHandler("invalid-form", [ this ]), this.formSubmitted = !1);
                },
                previousValue: function(t) {
                    return e.data(t, "previousValue") || e.data(t, "previousValue", {
                        old: null,
                    valid: !0,
                    message: this.defaultMessage(t, "remote")
                    });
                }
            },
            classRuleSettings: {
                required: {
                    required: !0
                },
                email: {
                    email: !0
                },
                url: {
                    url: !0
                },
                date: {
                    date: !0
                },
                dateISO: {
                    dateISO: !0
                },
                number: {
                    number: !0
                },
                digits: {
                    digits: !0
                },
                creditcard: {
                    creditcard: !0
                }
            },
            addClassRules: function(t, n) {
                t.constructor === String ? this.classRuleSettings[t] = n : e.extend(this.classRuleSettings, t);
            },
            classRules: function(t) {
                var n = {}, r = e(t).attr("class");
                return r && e.each(r.split(" "), function() {
                    this in e.validator.classRuleSettings && e.extend(n, e.validator.classRuleSettings[this]);
                }), n;
            },
            attributeRules: function(t) {
                var n = {}, r = e(t), i = r[0].getAttribute("type");
                for (var s in e.validator.methods) {
                    var o;
                    s === "required" ? (o = r.get(0).getAttribute(s), o === "" && (o = !0), o = !!o) : o = r.attr(s), /min|max/.test(s) && (i === null || /number|range|text/.test(i)) && (o = Number(o)), o ? n[s] = o : i === s && i !== "range" && (n[s] = !0);
                }
                return n.maxlength && /-1|2147483647|524288/.test(n.maxlength) && delete n.maxlength, n;
            },
            dataRules: function(t) {
                var n, r, i = {}, s = e(t);
                for (n in e.validator.methods) r = s.data("rule-" + n.toLowerCase()), r !== undefined && (i[n] = r);
                return i;
            },
            staticRules: function(t) {
                var n = {}, r = e.data(t.form, "validator");
                return r.settings.rules && (n = e.validator.normalizeRule(r.settings.rules[t.name]) || {}), n;
            },
            normalizeRules: function(t, n) {
                return e.each(t, function(r, i) {
                    if (i === !1) {
                        delete t[r];
                        return;
                    }
                    if (i.param || i.depends) {
                        var s = !0;
                        switch (typeof i.depends) {
                            case "string":
                                s = !!e(i.depends, n.form).length;
                                break;
                            case "function":
                                s = i.depends.call(n, n);
                        }
                        s ? t[r] = i.param !== undefined ? i.param : !0 : delete t[r];
                    }
                }), e.each(t, function(r, i) {
                    t[r] = e.isFunction(i) ? i(n) : i;
                }), e.each([ "minlength", "maxlength" ], function() {
                    t[this] && (t[this] = Number(t[this]));
                }), e.each([ "rangelength", "range" ], function() {
                    var n;
                    t[this] && (e.isArray(t[this]) ? t[this] = [ Number(t[this][0]), Number(t[this][1]) ] : typeof t[this] == "string" && (n = t[this].split(/[\s,]+/), t[this] = [ Number(n[0]), Number(n[1]) ]));
                }), e.validator.autoCreateRanges && (t.min && t.max && (t.range = [ t.min, t.max ], delete t.min, delete t.max), t.minlength && t.maxlength && (t.rangelength = [ t.minlength, t.maxlength ], delete t.minlength, delete t.maxlength)), t;
            },
            normalizeRule: function(t) {
                if (typeof t == "string") {
                    var n = {};
                    e.each(t.split(/\s/), function() {
                        n[this] = !0;
                    }), t = n;
                }
                return t;
            },
            addMethod: function(t, n, r) {
                e.validator.methods[t] = n, e.validator.messages[t] = r !== undefined ? r : e.validator.messages[t], n.length < 3 && e.validator.addClassRules(t, e.validator.normalizeRule(t));
            },
            methods: {
                required: function(t, n, r) {
                    if (!this.depend(r, n)) return "dependency-mismatch";
                    if (n.nodeName.toLowerCase() === "select") {
                        var i = e(n).val();
                        return i && i.length > 0;
                    }
                    return this.checkable(n) ? this.getLength(t, n) > 0 : e.trim(t).length > 0;
                },
                email: function(e, t) {
                    return this.optional(t) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(e);
                },
                url: function(e, t) {
                    return this.optional(t) || /^(https?|s?ftp|weixin):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(e);
                },
                date: function(e, t) {
                    return this.optional(t) || !/Invalid|NaN/.test((new Date(e)).toString());
                },
                dateISO: function(e, t) {
                    return this.optional(t) || /^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/.test(e);
                },
                number: function(e, t) {
                    return this.optional(t) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(e);
                },
                digits: function(e, t) {
                    return this.optional(t) || /^\d+$/.test(e);
                },
                creditcard: function(e, t) {
                    if (this.optional(t)) return "dependency-mismatch";
                    if (/[^0-9 \-]+/.test(e)) return !1;
                    var n = 0, r = 0, i = !1;
                    e = e.replace(/\D/g, "");
                    for (var s = e.length - 1; s >= 0; s--) {
                        var o = e.charAt(s);
                        r = parseInt(o, 10), i && (r *= 2) > 9 && (r -= 9), n += r, i = !i;
                    }
                    return n % 10 === 0;
                },
                minlength: function(t, n, r) {
                    var i = e.isArray(t) ? t.length : this.getLength(e.trim(t), n);
                    return this.optional(n) || i >= r;
                },
                maxlength: function(t, n, r) {
                    var i = e.isArray(t) ? t.length : this.getLength(e.trim(t), n);
                    return this.optional(n) || i <= r;
                },
                rangelength: function(t, n, r) {
                    var i = e.isArray(t) ? t.length : this.getLength(e.trim(t), n);
                    return this.optional(n) || i >= r[0] && i <= r[1];
                },
                min: function(e, t, n) {
                    return this.optional(t) || e >= n;
                },
                max: function(e, t, n) {
                    return this.optional(t) || e <= n;
                },
                range: function(e, t, n) {
                    return this.optional(t) || e >= n[0] && e <= n[1];
                },
                equalTo: function(t, n, r) {
                    var i = e(r);
                    return this.settings.onfocusout && i.unbind(".validate-equalTo").bind("blur.validate-equalTo", function() {
                        e(n).valid();
                    }), t === i.val();
                },
                remote: function(t, n, r) {
                    if (this.optional(n)) return "dependency-mismatch";
                    var i = this.previousValue(n);
                    this.settings.messages[n.name] || (this.settings.messages[n.name] = {}), i.originalMessage = this.settings.messages[n.name].remote, this.settings.messages[n.name].remote = i.message, r = typeof r == "string" && {
                        url: r
                    } || r;
                    if (i.old === t) return i.valid;
                    i.old = t;
                    var s = this;
                    this.startRequest(n);
                    var o = {};
                    return o[n.name] = t, e.ajax(e.extend(!0, {
                        url: r,
                           mode: "abort",
                           port: "validate" + n.name,
                           dataType: "json",
                           data: o,
                           success: function(r) {
                               s.settings.messages[n.name].remote = i.originalMessage;
                               var o = r === !0 || r === "true";
                               if (o) {
                                   var u = s.formSubmitted;
                                   s.prepareElement(n), s.formSubmitted = u, s.successList.push(n), delete s.invalid[n.name], s.showErrors();
                               } else {
                                   var a = {}, f = r || s.defaultMessage(n, "remote");
                                   a[n.name] = i.message = e.isFunction(f) ? f(t) : f, s.invalid[n.name] = !0, s.showErrors(a);
                               }
                               i.valid = o, s.stopRequest(n, o);
                           }
                    }, r)), "pending";
                }
            }
        }), e.format = e.validator.format;
    })(jQuery), function(e) {
        var t = {};
        if (e.ajaxPrefilter) e.ajaxPrefilter(function(e, n, r) {
            var i = e.port;
            e.mode === "abort" && (t[i] && t[i].abort(), t[i] = r);
        }); else {
            var n = e.ajax;
            e.ajax = function(r) {
                var i = ("mode" in r ? r : e.ajaxSettings).mode, s = ("port" in r ? r : e.ajaxSettings).port;
                return i === "abort" ? (t[s] && t[s].abort(), t[s] = n.apply(this, arguments), t[s]) : n.apply(this, arguments);
            };
        }
    }(jQuery), function(e) {
        e.extend(e.fn, {
            validateDelegate: function(t, n, r) {
                return this.bind(n, function(n) {
                    var i = e(n.target);
                    if (i.is(t)) return r.apply(i, arguments);
                });
            }
        });
    }(jQuery), function(e) {
        e.validator.defaults.errorClass = "frm_msg_content", e.validator.defaults.errorElement = "span", e.validator.defaults.errorPlacement = function(e, t) {
            t.parent().after(e);
        }, e.validator.defaults.wrapper = "p", e.validator.messages = {
            required: "必选字段",
            remote: "请修正该字段",
            email: "请输入正确格式的电子邮件",
            url: "请输入合法的网址",
            date: "请输入合法的日期",
            dateISO: "请输入合法的日期 (ISO).",
            number: "请输入合法的数字",
            digits: "只能输入整数",
            creditcard: "请输入合法的信用卡号",
            equalTo: "请再次输入相同的值",
            accept: "请输入拥有合法后缀名的字符串",
            maxlength: e.validator.format("请输入一个长度最多是 {0} 的字符串"),
            minlength: e.validator.format("请输入一个长度最少是 {0} 的字符串"),
            rangelength: e.validator.format("请输入一个长度介于 {0} 和 {1} 之间的字符串"),
            range: e.validator.format("请输入一个介于 {0} 和 {1} 之间的值"),
            max: e.validator.format("请输入一个最大为 {0} 的值"),
            min: e.validator.format("请输入一个最小为 {0} 的值")
        }, function() {
            function r(e) {
                var r = 0;
                e[17].toLowerCase() == "x" && (e[17] = 10);
                for (var i = 0; i < 17; i++) r += t[i] * e[i];
                return valCodePosition = r % 11, e[17] == n[valCodePosition] ? !0 : !1;
            }
            function i(e) {
                var t = e.substring(6, 10), n = e.substring(10, 12), r = e.substring(12, 14), i = new Date(t, parseFloat(n) - 1, parseFloat(r));
                return (new Date).getFullYear() - parseInt(t) < 18 ? !1 : i.getFullYear() != parseFloat(t) || i.getMonth() != parseFloat(n) - 1 || i.getDate() != parseFloat(r) ? !1 : !0;
            }
            function s(e) {
                var t = e.substring(6, 8), n = e.substring(8, 10), r = e.substring(10, 12), i = new Date(t, parseFloat(n) - 1, parseFloat(r));
                return i.getYear() != parseFloat(t) || i.getMonth() != parseFloat(n) - 1 || i.getDate() != parseFloat(r) ? !1 : !0;
            }
            function o(t) {
                t = e.trim(t.replace(/ /g, ""));
                if (t.length == 15) return !1;
                if (t.length == 18) {
                    var n = t.split("");
                    return i(t) && r(n) ? !0 : !1;
                }
                return !1;
            }
            var t = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1 ], n = [ 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ];
            e.validator.addMethod("idcard", function(e, t, n) {
                return o(e);
            }, "身份证格式不正确，或者年龄未满18周岁，请重新填写。"), e.validator.addMethod("mobile", function(t, n, r) {
                return t = e.trim(t), /^1\d{10}$/.test(t);
            }, "请输入正确的手机号码"), e.validator.addMethod("byteRangeLength", function(e, t, n) {
                return this.optional(t) || e.len() <= n[1] && e.len() >= n[0];
            }, "_(必须为{0}到{1}个字节之间)");
        }();
    }(jQuery);
    var r = {
        optional: function(e) {
            return !1;
        },
        getLength: function(e) {
            return e ? e.length : 0;
        }
    }, s = $.validator;
    return s.rules = {}, $.each(s.methods, function(e, t) {
        s.rules[e] = function(e, n) {
            return t.call(r, e, null, n);
        };
    }), s;
});
define("common/wx/upload.js", [ "common/lib/uploadify.js", "xss/ui/upload.css", "common/wx/Tips.js", "tpl/uploader.html.js", "common/lib/swfobject.js", "common/wx/dialog.js", "common/wx/Cgi.js" ], function(e, t, n) {
    "use strict";
    function r(e, t) {
        if (t == 0) return r(e, d) || r(e, v) || r(e, m) || r(e, g);
        var e = e.substr(1).toLowerCase(), n = b[t];
        return n && n.ext.indexOf(e) != -1;
    }
    function i(e, t, n) {
        var r = w(e);
        return t <= b[r][n].limit;
    }
    e("common/lib/uploadify.js"), e("xss/ui/upload.css");
    var s = wx.T, o = e("common/wx/Tips.js"), u = e("tpl/uploader.html.js"), a = e("common/lib/swfobject.js"), f = e("common/wx/dialog.js"), l = e("common/wx/Cgi.js"), c = wx.path.uploadify, h = wx.data.t, p = 0, d = 2, v = 3, m = 4, g = 5, y = 6, b = {
        "0": {
            type: p,
    tip: "格式错误",
    msg: "图片格式必须为以下格式：bmp, png, jpeg, jpg, gif<br/>语音格式必须为以下格式：mp3, wma, wav, amr<br/>视频格式必须为以下格式：rm, rmvb, wmv, avi, mpg, mpeg, mp4<br/>文档格式必须为以下格式：pdf"
        },
    "2": {
        type: d,
    tip: "格式错误",
    msg: "图片格式必须为以下格式：bmp, png, jpeg, jpg, gif",
    ext: "bmp|png|jpeg|jpg|gif",
    bizfile: {
        limit: 2e3,
        msg: "上传的%s过%sM".sprintf("图片", 2),
        tip: "大小超过%sM".sprintf(2)
    },
    tmpfile: {
        limit: 2e3,
        msg: "上传的%s过%sM".sprintf("图片", 2),
        tip: "大小超过%sM".sprintf(2)
    }
    },
    "3": {
        type: v,
        tip: "格式错误",
        msg: "语音格式必须为以下格式：mp3, wma, wav, amr",
        ext: "mp3|wma|wav|amr",
        bizfile: {
            limit: 5e3,
            msg: "上传的%s过%sM".sprintf("语音", 5),
            tip: "大小超过%sM".sprintf(5)
        },
        tmpfile: {
            limit: 5e3,
            msg: "上传的%s过%sM".sprintf("语音", 5),
            tip: "大小超过%sM".sprintf(5)
        }
    },
    "4": {
        type: m,
        tip: "格式错误",
        msg: "视频格式必须为以下格式：rm, rmvb, wmv, avi, mpg, mpeg, mp4",
        ext: "rm|rmvb|wmv|avi|mpg|mpeg|mp4",
        bizfile: {
            limit: 2e4,
            msg: "上传的%s过%sM".sprintf("视频", 20),
            tip: "大小超过%sM".sprintf(20)
        },
        tmpfile: {
            limit: 2e4,
            msg: "上传的%s过%sM".sprintf("视频", 20),
            tip: "大小超过%sM".sprintf(20)
        }
    },
    "5": {
        type: g,
        tip: "格式错误",
        msg: "文档格式必须为以下格式：pdf",
        ext: "pdf",
        bizfile: {
            limit: 1e4,
            msg: "上传的%s过%sM".sprintf("文档", 10),
            tip: "大小超过%sM".sprintf(20)
        },
        tmpfile: {
            limit: 1e4,
            msg: "上传的%s过%sM".sprintf("文档", 10),
            tip: "大小超过%sM".sprintf(10)
        }
    },
    "6": {
        type: y,
        tip: "格式错误",
        msg: "图片格式必须为以下格式：bmp, png, jpeg, jpg, gif<br/>文档格式必须为以下格式：pdf",
        ext: "bmp|png|jpeg|jpg|gif|pdf"
    }
    };
    b[15] = b[4];
    var w = function(e) {
        var t = [ d, v, m, g ];
        e = e.substr(1).toLowerCase();
        for (var n = 0; n < t.length; ++n) {
            var r = b[t[n]];
            if (r && r.ext && r.ext.indexOf(e) != -1) return t[n];
        }
        return !1;
    }, E = {
        uploader: c,
        queueID: "fileQueue",
        cancelImg: "cancel.png",
        folder: "uploads",
        fileDataName: "file",
        auto: !0,
        multi: !0,
        hideButton: !0
    }, S = function(e, t) {
        return e = e + "&ticket_id=" + wx.data.user_name + "&ticket=" + wx.data.ticket, function(n) {
            function c(e) {
                h.show().append(s(u, e));
            }
            var h = $('<ul class="upload_file_box"></ul>'), p = $(n.container);
            n.type = n.type || 0;
            if (!a.ua.pv[0]) return p.click(function() {
                f.show({
                    type: "warn",
                    msg: "警告|<p>未安装或未正确配置flash插件，请检查后重试。<br><a href='http://get.adobe.com/cn/flashplayer/' target='_blank'>到adobe去下载flash插件</a></p>",
                    mask: !0,
                    buttons: [ {
                        text: "确定",
                    click: function() {
                        this.remove();
                    }
                    } ]
                });
            }), !1;
            n = $.extend(!0, {}, E, n);
            var d = n.uploadlist$ ? $(n.uploadlist$) : p.parent(), v = {};
            d.append(h.hide());
            var m = $.extend(!0, {}, n, {
                script: wx.url(e),
                onSelectOnce: function() {
                    $.isEmptyObject(v) ? h.hide() : h.show(), v = {};
                },
                onQueueFull: function(e, t) {
                    return v = {}, h.html(""), f.show({
                        type: "warn",
                    msg: "警告|一次上传最多只能上传%s个文件".sprintf(t),
                    mask: !0,
                    buttons: [ {
                        text: "确定",
                    click: function() {
                        this.remove();
                    }
                    } ]
                    }), !1;
                },
                onSelect: function(e, s, u) {
                    var a = u.type, f = w(a), l = f && b[f].type || n.type, h = "KB", p = Math.round(u.size / 1024 * 100) * .01, d = p;
                    d > 1e3 && (d = Math.round(d * .001 * 100) * .01, h = "MB");
                    var m = {
                        id: s,
                        fileName: u.name,
                        size: d + h
                    };
                    if (!r(a, n.type)) return o.err(b[n.type + ""].msg), m.status = b[n.type + ""].tip, m.className = "error", !1;
                    if (!i(a, p, t)) return o.err(b[f + ""][t].msg), m.status = b[f + ""][t].tip, m.className = "error", !1;
                    m.status = "正在上传", v[s] = !0, c(m), n.onSelect && n.onSelect(e, s, u);
                },
                onProgress: function(e, t, r, i) {
                    var s = h.find("#uploadItem" + t).find(".progress_bar_thumb");
                    if (s.data("status") == "error") return;
                    s.css("width", i.percentage + "%"), n.onProgress && n.onProgress(e, t, r, i);
                },
                onComplete: function(e, t, r, i, s) {
                    var u = h.find("#uploadItem" + t).find(".upload_file_status");
                    if (u.data("status") == "error") return;
                    i = $.parseJSON(i);
                    if (i && i.base_resp) {
                        var a = i.base_resp.ret;
                        a == 0 ? (delete v[t], h.find("#uploadItem" + t).find(".upload_file_status").addClass("success").html("上传成功")) : a == -18 ? o.err("页面停留时间过久，请刷新页面后重试！") : a == -20 ? o.err("无法解释该图片，请使用另一图片或截图另存") : a == -13 ? o.err("上传文件过于频繁，请稍后再试") : a == -10 ? o.err("上传文件过大") : l.show(i);
                    }
                    n.onComplete && n.onComplete(e, t, r, i, s);
                },
                onAllComplete: function(e, t) {
                    setTimeout(function() {
                        h.fadeOut().html("");
                    }, 3e3), $.isEmptyObject(v) ? n.onAllComplete && n.onAllComplete(e, t) : o.err("上传文件发送出错，请刷新页面后重试！");
                }
            });
            p.uploadify(m);
        };
    }, x = function(e) {
        return function(t) {
            return wx.url(e + "&ticket_id=" + wx.data.user_name + "&ticket=" + wx.data.ticket + "&id=" + t);
        };
    }, T = ~location.hostname.search(/^mp/) ? "https://mp.weixin.qq.com" : "";
    return {
        uploadBizFile: S(T + "/cgi-bin/filetransfer?action=upload_material&f=json", "bizfile"),
            uploadTmpFile: S(T + "/cgi-bin/filetransfer?action=preview&f=json", "tmpfile"),
            uploadCdnFile: S(T + "/cgi-bin/filetransfer?action=upload_cdn&f=json", "tmpfile"),
            uploadVideoCdnFile: S(T + "/cgi-bin/filetransfer?action=upload_video_cdn&f=json", "tmpfile"),
            tmpFileUrl: x(T + "/cgi-bin/filetransfer?action=preview"),
            mediaFileUrl: x(T + "/cgi-bin/filetransfer?action=bizmedia"),
            multimediaFileUrl: x(T + "/cgi-bin/filetransfer?action=multimedia")
    };
});
define("common/lib/moment.js", [], function(e, t, n) {
    function _(e, t) {
        return function(n) {
            return I(e.call(this, n), t);
        };
    }
    function D(e) {
        return function(t) {
            return this.lang().ordinal(e.call(this, t));
        };
    }
    function P() {}
    function H(e) {
        j(this, e);
    }
    function B(e) {
        var t = this._data = {}, n = e.years || e.year || e.y || 0, r = e.months || e.month || e.M || 0, i = e.weeks || e.week || e.w || 0, s = e.days || e.day || e.d || 0, o = e.hours || e.hour || e.h || 0, u = e.minutes || e.minute || e.m || 0, a = e.seconds || e.second || e.s || 0, f = e.milliseconds || e.millisecond || e.ms || 0;
        this._milliseconds = f + a * 1e3 + u * 6e4 + o * 36e5, this._days = s + i * 7, this._months = r + n * 12, t.milliseconds = f % 1e3, a += F(f / 1e3), t.seconds = a % 60, u += F(a / 60), t.minutes = u % 60, o += F(u / 60), t.hours = o % 24, s += F(o / 24), s += i * 7, t.days = s % 30, r += F(s / 30), t.months = r % 12, n += F(r / 12), t.years = n;
    }
    function j(e, t) {
        for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n]);
        return e;
    }
    function F(e) {
        return e < 0 ? Math.ceil(e) : Math.floor(e);
    }
    function I(e, t) {
        var n = e + "";
        while (n.length < t) n = "0" + n;
        return n;
    }
    function q(e, t, n) {
        var r = t._milliseconds, i = t._days, s = t._months, o;
        r && e._d.setTime(+e + r * n), i && e.date(e.date() + i * n), s && (o = e.date(), e.date(1).month(e.month() + s * n).date(Math.min(o, e.daysInMonth())));
    }
    function R(e) {
        return Object.prototype.toString.call(e) === "[object Array]";
    }
    function U(e, t) {
        var n = Math.min(e.length, t.length), r = Math.abs(e.length - t.length), i = 0, s;
        for (s = 0; s < n; s++) ~~e[s] !== ~~t[s] && i++;
        return i + r;
    }
    function z(e, t) {
        return t.abbr = e, u[e] || (u[e] = new P), u[e].set(t), u[e];
    }
    function W(t) {
        return t ? (!u[t] && a && e("./lang/" + t), u[t]) : r.fn._lang;
    }
    function X(e) {
        return e.match(/\[.*\]/) ? e.replace(/^\[|\]$/g, "") : e.replace(/\\/g, "");
    }
    function V(e) {
        var t = e.match(l), n, r;
        for (n = 0, r = t.length; n < r; n++) M[t[n]] ? t[n] = M[t[n]] : t[n] = X(t[n]);
        return function(i) {
            var s = "";
            for (n = 0; n < r; n++) s += typeof t[n].call == "function" ? t[n].call(i, e) : t[n];
            return s;
        };
    }
    function $(e, t) {
        function r(t) {
            return e.lang().longDateFormat(t) || t;
        }
        var n = 5;
        while (n-- && c.test(t)) t = t.replace(c, r);
        return L[t] || (L[t] = V(t)), L[t](e);
    }
    function J(e) {
        switch (e) {
            case "DDDD":
                return v;
            case "YYYY":
                return m;
            case "YYYYY":
                return g;
            case "S":
            case "SS":
            case "SSS":
            case "DDD":
                return d;
            case "MMM":
            case "MMMM":
            case "dd":
            case "ddd":
            case "dddd":
            case "a":
            case "A":
                return y;
            case "X":
                return E;
            case "Z":
            case "ZZ":
                return b;
            case "T":
                return w;
            case "MM":
            case "DD":
            case "YY":
            case "HH":
            case "hh":
            case "mm":
            case "ss":
            case "M":
            case "D":
            case "d":
            case "H":
            case "h":
            case "m":
            case "s":
                return p;
            default:
                return new RegExp(e.replace("\\", ""));
        }
    }
    function K(e, t, n) {
        var r, i, s = n._a;
        switch (e) {
            case "M":
            case "MM":
                s[1] = t == null ? 0 : ~~t - 1;
                break;
            case "MMM":
            case "MMMM":
                r = W(n._l).monthsParse(t), r != null ? s[1] = r : n._isValid = !1;
                break;
            case "D":
            case "DD":
            case "DDD":
            case "DDDD":
                t != null && (s[2] = ~~t);
                break;
            case "YY":
                s[0] = ~~t + (~~t > 68 ? 1900 : 2e3);
                break;
            case "YYYY":
            case "YYYYY":
                s[0] = ~~t;
                break;
            case "a":
            case "A":
                n._isPm = (t + "").toLowerCase() === "pm";
                break;
            case "H":
            case "HH":
            case "h":
            case "hh":
                s[3] = ~~t;
                break;
            case "m":
            case "mm":
                s[4] = ~~t;
                break;
            case "s":
            case "ss":
                s[5] = ~~t;
                break;
            case "S":
            case "SS":
            case "SSS":
                s[6] = ~~(("0." + t) * 1e3);
                break;
            case "X":
                n._d = new Date(parseFloat(t) * 1e3);
                break;
            case "Z":
            case "ZZ":
                n._useUTC = !0, r = (t + "").match(N), r && r[1] && (n._tzh = ~~r[1]), r && r[2] && (n._tzm = ~~r[2]), r && r[0] === "+" && (n._tzh = -n._tzh, n._tzm = -n._tzm);
        }
        t == null && (n._isValid = !1);
    }
    function Q(e) {
        var t, n, r = [];
        if (e._d) return;
        for (t = 0; t < 7; t++) e._a[t] = r[t] = e._a[t] == null ? t === 2 ? 1 : 0 : e._a[t];
        r[3] += e._tzh || 0, r[4] += e._tzm || 0, n = new Date(0), e._useUTC ? (n.setUTCFullYear(r[0], r[1], r[2]), n.setUTCHours(r[3], r[4], r[5], r[6])) : (n.setFullYear(r[0], r[1], r[2]), n.setHours(r[3], r[4], r[5], r[6])), e._d = n;
    }
    function G(e) {
        var t = e._f.match(l), n = e._i, r, i;
        e._a = [];
        for (r = 0; r < t.length; r++) i = (J(t[r]).exec(n) || [])[0], i && (n = n.slice(n.indexOf(i) + i.length)), M[t[r]] && K(t[r], i, e);
        e._isPm && e._a[3] < 12 && (e._a[3] += 12), e._isPm === !1 && e._a[3] === 12 && (e._a[3] = 0), Q(e);
    }
    function Y(e) {
        var t, n, r, i = 99, s, o, u;
        while (e._f.length) {
            t = j({}, e), t._f = e._f.pop(), G(t), n = new H(t);
            if (n.isValid()) {
                r = n;
                break;
            }
            u = U(t._a, n.toArray()), u < i && (i = u, r = n);
        }
        j(e, r);
    }
    function Z(e) {
        var t, n = e._i;
        if (S.exec(n)) {
            e._f = "YYYY-MM-DDT";
            for (t = 0; t < 4; t++) if (T[t][1].exec(n)) {
                e._f += T[t][0];
                break;
            }
            b.exec(n) && (e._f += " Z"), G(e);
        } else e._d = new Date(n);
    }
    function et(e) {
        var t = e._i, n = f.exec(t);
        t === undefined ? e._d = new Date : n ? e._d = new Date(+n[1]) : typeof t == "string" ? Z(e) : R(t) ? (e._a = t.slice(0), Q(e)) : e._d = t instanceof Date ? new Date(+t) : new Date(t);
    }
    function tt(e, t, n, r, i) {
        return i.relativeTime(t || 1, !!n, e, r);
    }
    function nt(e, t, n) {
        var r = s(Math.abs(e) / 1e3), i = s(r / 60), o = s(i / 60), u = s(o / 24), a = s(u / 365), f = r < 45 && [ "s", r ] || i === 1 && [ "m" ] || i < 45 && [ "mm", i ] || o === 1 && [ "h" ] || o < 22 && [ "hh", o ] || u === 1 && [ "d" ] || u <= 25 && [ "dd", u ] || u <= 45 && [ "M" ] || u < 345 && [ "MM", s(u / 30) ] || a === 1 && [ "y" ] || [ "yy", a ];
        return f[2] = t, f[3] = e > 0, f[4] = n, tt.apply({}, f);
    }
    function rt(e, t, n) {
        var i = n - t, s = n - e.day();
        return s > i && (s -= 7), s < i - 7 && (s += 7), Math.ceil(r(e).add("d", s).dayOfYear() / 7);
    }
    function it(e) {
        var t = e._i, n = e._f;
        return t === null || t === "" ? null : (typeof t == "string" && (e._i = t = W().preparse(t)), r.isMoment(t) ? (e = j({}, t), e._d = new Date(+t._d)) : n ? R(n) ? Y(e) : G(e) : et(e), new H(e));
    }
    function st(e, t) {
        r.fn[e] = r.fn[e + "s"] = function(e) {
            var n = this._isUTC ? "UTC" : "";
            return e != null ? (this._d["set" + n + t](e), this) : this._d["get" + n + t]();
        };
    }
    function ot(e) {
        r.duration.fn[e] = function() {
            return this._data[e];
        };
    }
    function ut(e, t) {
        r.duration.fn["as" + e] = function() {
            return +this / t;
        };
    }
    var r, i = "2.0.0", s = Math.round, o, u = {}, a = typeof n != "undefined" && n.exports, f = /^\/?Date\((\-?\d+)/i, l = /(\[[^\[]*\])|(\\)?(Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|YYYYY|YYYY|YY|a|A|hh?|HH?|mm?|ss?|SS?S?|X|zz?|ZZ?|.)/g, c = /(\[[^\[]*\])|(\\)?(LT|LL?L?L?|l{1,4})/g, h = /([0-9a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)/gi, p = /\d\d?/, d = /\d{1,3}/, v = /\d{3}/, m = /\d{1,4}/, g = /[+\-]?\d{1,6}/, y = /[0-9]*[a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+|[\u0600-\u06FF]+\s*?[\u0600-\u06FF]+/i, b = /Z|[\+\-]\d\d:?\d\d/i, w = /T/i, E = /[\+\-]?\d+(\.\d{1,3})?/, S = /^\s*\d{4}-\d\d-\d\d((T| )(\d\d(:\d\d(:\d\d(\.\d\d?\d?)?)?)?)?([\+\-]\d\d:?\d\d)?)?/, x = "YYYY-MM-DDTHH:mm:ssZ", T = [ [ "HH:mm:ss.S", /(T| )\d\d:\d\d:\d\d\.\d{1,3}/ ], [ "HH:mm:ss", /(T| )\d\d:\d\d:\d\d/ ], [ "HH:mm", /(T| )\d\d:\d\d/ ], [ "HH", /(T| )\d\d/ ] ], N = /([\+\-]|\d\d)/gi, C = "Month|Date|Hours|Minutes|Seconds|Milliseconds".split("|"), k = {
        Milliseconds: 1,
        Seconds: 1e3,
        Minutes: 6e4,
        Hours: 36e5,
        Days: 864e5,
        Months: 2592e6,
        Years: 31536e6
    }, L = {}, A = "DDD w W M D d".split(" "), O = "M D H h m s w W".split(" "), M = {
        M: function() {
            return this.month() + 1;
        },
        MMM: function(e) {
            return this.lang().monthsShort(this, e);
        },
        MMMM: function(e) {
            return this.lang().months(this, e);
        },
        D: function() {
            return this.date();
        },
        DDD: function() {
            return this.dayOfYear();
        },
        d: function() {
            return this.day();
        },
        dd: function(e) {
            return this.lang().weekdaysMin(this, e);
        },
        ddd: function(e) {
            return this.lang().weekdaysShort(this, e);
        },
        dddd: function(e) {
            return this.lang().weekdays(this, e);
        },
        w: function() {
            return this.week();
        },
        W: function() {
            return this.isoWeek();
        },
        YY: function() {
            return I(this.year() % 100, 2);
        },
        YYYY: function() {
            return I(this.year(), 4);
        },
        YYYYY: function() {
            return I(this.year(), 5);
        },
        a: function() {
            return this.lang().meridiem(this.hours(), this.minutes(), !0);
        },
        A: function() {
            return this.lang().meridiem(this.hours(), this.minutes(), !1);
        },
        H: function() {
            return this.hours();
        },
        h: function() {
            return this.hours() % 12 || 12;
        },
        m: function() {
            return this.minutes();
        },
        s: function() {
            return this.seconds();
        },
        S: function() {
            return ~~(this.milliseconds() / 100);
        },
        SS: function() {
            return I(~~(this.milliseconds() / 10), 2);
        },
        SSS: function() {
            return I(this.milliseconds(), 3);
        },
        Z: function() {
            var e = -this.zone(), t = "+";
            return e < 0 && (e = -e, t = "-"), t + I(~~(e / 60), 2) + ":" + I(~~e % 60, 2);
        },
        ZZ: function() {
            var e = -this.zone(), t = "+";
            return e < 0 && (e = -e, t = "-"), t + I(~~(10 * e / 6), 4);
        },
        X: function() {
            return this.unix();
        }
    };
    while (A.length) o = A.pop(), M[o + "o"] = D(M[o]);
while (O.length) o = O.pop(), M[o + o] = _(M[o], 2);
M.DDDD = _(M.DDD, 3), P.prototype = {
    set: function(e) {
        var t, n;
        for (n in e) t = e[n], typeof t == "function" ? this[n] = t : this["_" + n] = t;
    },
    _months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
    months: function(e) {
        return this._months[e.month()];
    },
    _monthsShort: "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_"),
    monthsShort: function(e) {
        return this._monthsShort[e.month()];
    },
    monthsParse: function(e) {
        var t, n, i, s;
        this._monthsParse || (this._monthsParse = []);
        for (t = 0; t < 12; t++) {
            this._monthsParse[t] || (n = r([ 2e3, t ]), i = "^" + this.months(n, "") + "|^" + this.monthsShort(n, ""), this._monthsParse[t] = new RegExp(i.replace(".", ""), "i"));
            if (this._monthsParse[t].test(e)) return t;
        }
    },
    _weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
    weekdays: function(e) {
        return this._weekdays[e.day()];
    },
    _weekdaysShort: "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
    weekdaysShort: function(e) {
        return this._weekdaysShort[e.day()];
    },
    _weekdaysMin: "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
    weekdaysMin: function(e) {
        return this._weekdaysMin[e.day()];
    },
    _longDateFormat: {
        LT: "h:mm A",
        L: "MM/DD/YYYY",
        LL: "MMMM D YYYY",
        LLL: "MMMM D YYYY LT",
        LLLL: "dddd, MMMM D YYYY LT"
    },
    longDateFormat: function(e) {
        var t = this._longDateFormat[e];
        return !t && this._longDateFormat[e.toUpperCase()] && (t = this._longDateFormat[e.toUpperCase()].replace(/MMMM|MM|DD|dddd/g, function(e) {
            return e.slice(1);
        }), this._longDateFormat[e] = t), t;
    },
    meridiem: function(e, t, n) {
        return e > 11 ? n ? "pm" : "PM" : n ? "am" : "AM";
    },
    _calendar: {
        sameDay: "[Today at] LT",
        nextDay: "[Tomorrow at] LT",
        nextWeek: "dddd [at] LT",
        lastDay: "[Yesterday at] LT",
        lastWeek: "[last] dddd [at] LT",
        sameElse: "L"
    },
    calendar: function(e, t) {
        var n = this._calendar[e];
        return typeof n == "function" ? n.apply(t) : n;
    },
    _relativeTime: {
        future: "in %s",
        past: "%s ago",
        s: "a few seconds",
        m: "a minute",
        mm: "%d minutes",
        h: "an hour",
        hh: "%d hours",
        d: "a day",
        dd: "%d days",
        M: "a month",
        MM: "%d months",
        y: "a year",
        yy: "%d years"
    },
    relativeTime: function(e, t, n, r) {
        var i = this._relativeTime[n];
        return typeof i == "function" ? i(e, t, n, r) : i.replace(/%d/i, e);
    },
    pastFuture: function(e, t) {
        var n = this._relativeTime[e > 0 ? "future" : "past"];
        return typeof n == "function" ? n(t) : n.replace(/%s/i, t);
    },
    ordinal: function(e) {
        return this._ordinal.replace("%d", e);
    },
    _ordinal: "%d",
    preparse: function(e) {
        return e;
    },
    postformat: function(e) {
        return e;
    },
    week: function(e) {
        return rt(e, this._week.dow, this._week.doy);
    },
    _week: {
        dow: 0,
        doy: 6
    }
}, r = function(e, t, n) {
    return it({
        _i: e,
           _f: t,
           _l: n,
           _isUTC: !1
    });
}, r.utc = function(e, t, n) {
    return it({
        _useUTC: !0,
           _isUTC: !0,
           _l: n,
           _i: e,
           _f: t
    });
}, r.unix = function(e) {
    return r(e * 1e3);
}, r.duration = function(e, t) {
    var n = r.isDuration(e), i = typeof e == "number", s = n ? e._data : i ? {} : e, o;
    return i && (t ? s[t] = e : s.milliseconds = e), o = new B(s), n && e.hasOwnProperty("_lang") && (o._lang = e._lang), o;
}, r.version = i, r.defaultFormat = x, r.lang = function(e, t) {
    var n;
    if (!e) return r.fn._lang._abbr;
    t ? z(e, t) : u[e] || W(e), r.duration.fn._lang = r.fn._lang = W(e);
}, r.langData = function(e) {
    return e && e._lang && e._lang._abbr && (e = e._lang._abbr), W(e);
}, r.isMoment = function(e) {
    return e instanceof H;
}, r.isDuration = function(e) {
    return e instanceof B;
}, r.fn = H.prototype = {
    clone: function() {
        return r(this);
    },
    valueOf: function() {
        return +this._d;
    },
    unix: function() {
        return Math.floor(+this._d / 1e3);
    },
    toString: function() {
        return this.format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ");
    },
    toDate: function() {
        return this._d;
    },
    toJSON: function() {
        return r.utc(this).format("YYYY-MM-DD[T]HH:mm:ss.SSS[Z]");
    },
    toArray: function() {
        var e = this;
        return [ e.year(), e.month(), e.date(), e.hours(), e.minutes(), e.seconds(), e.milliseconds() ];
    },
    isValid: function() {
        return this._isValid == null && (this._a ? this._isValid = !U(this._a, (this._isUTC ? r.utc(this._a) : r(this._a)).toArray()) : this._isValid = !isNaN(this._d.getTime())), !!this._isValid;
    },
    utc: function() {
        return this._isUTC = !0, this;
    },
    local: function() {
        return this._isUTC = !1, this;
    },
    format: function(e) {
        var t = $(this, e || r.defaultFormat);
        return this.lang().postformat(t);
    },
    add: function(e, t) {
        var n;
        return typeof e == "string" ? n = r.duration(+t, e) : n = r.duration(e, t), q(this, n, 1), this;
    },
    subtract: function(e, t) {
        var n;
        return typeof e == "string" ? n = r.duration(+t, e) : n = r.duration(e, t), q(this, n, -1), this;
    },
    diff: function(e, t, n) {
        var i = this._isUTC ? r(e).utc() : r(e).local(), s = (this.zone() - i.zone()) * 6e4, o, u;
        return t && (t = t.replace(/s$/, "")), t === "year" || t === "month" ? (o = (this.daysInMonth() + i.daysInMonth()) * 432e5, u = (this.year() - i.year()) * 12 + (this.month() - i.month()), u += (this - r(this).startOf("month") - (i - r(i).startOf("month"))) / o, t === "year" && (u /= 12)) : (o = this - i - s, u = t === "second" ? o / 1e3 : t === "minute" ? o / 6e4 : t === "hour" ? o / 36e5 : t === "day" ? o / 864e5 : t === "week" ? o / 6048e5 : o), n ? u : F(u);
    },
    from: function(e, t) {
        return r.duration(this.diff(e)).lang(this.lang()._abbr).humanize(!t);
    },
    fromNow: function(e) {
        return this.from(r(), e);
    },
    calendar: function() {
        var e = this.diff(r().startOf("day"), "days", !0), t = e < -6 ? "sameElse" : e < -1 ? "lastWeek" : e < 0 ? "lastDay" : e < 1 ? "sameDay" : e < 2 ? "nextDay" : e < 7 ? "nextWeek" : "sameElse";
        return this.format(this.lang().calendar(t, this));
    },
    isLeapYear: function() {
        var e = this.year();
        return e % 4 === 0 && e % 100 !== 0 || e % 400 === 0;
    },
    isDST: function() {
        return this.zone() < r([ this.year() ]).zone() || this.zone() < r([ this.year(), 5 ]).zone();
    },
    day: function(e) {
        var t = this._isUTC ? this._d.getUTCDay() : this._d.getDay();
        return e == null ? t : this.add({
            d: e - t
        });
    },
    startOf: function(e) {
        e = e.replace(/s$/, "");
        switch (e) {
            case "year":
                this.month(0);
            case "month":
                this.date(1);
            case "week":
            case "day":
                this.hours(0);
            case "hour":
                this.minutes(0);
            case "minute":
                this.seconds(0);
            case "second":
                this.milliseconds(0);
        }
        return e === "week" && this.day(0), this;
    },
    endOf: function(e) {
        return this.startOf(e).add(e.replace(/s?$/, "s"), 1).subtract("ms", 1);
    },
    isAfter: function(e, t) {
        return t = typeof t != "undefined" ? t : "millisecond", +this.clone().startOf(t) > +r(e).startOf(t);
    },
    isBefore: function(e, t) {
        return t = typeof t != "undefined" ? t : "millisecond", +this.clone().startOf(t) < +r(e).startOf(t);
    },
    isSame: function(e, t) {
        return t = typeof t != "undefined" ? t : "millisecond", +this.clone().startOf(t) === +r(e).startOf(t);
    },
    zone: function() {
        return this._isUTC ? 0 : this._d.getTimezoneOffset();
    },
    daysInMonth: function() {
        return r.utc([ this.year(), this.month() + 1, 0 ]).date();
    },
    dayOfYear: function(e) {
        var t = s((r(this).startOf("day") - r(this).startOf("year")) / 864e5) + 1;
        return e == null ? t : this.add("d", e - t);
    },
    isoWeek: function(e) {
        var t = rt(this, 1, 4);
        return e == null ? t : this.add("d", (e - t) * 7);
    },
    week: function(e) {
        var t = this.lang().week(this);
        return e == null ? t : this.add("d", (e - t) * 7);
    },
    lang: function(e) {
        return e === undefined ? this._lang : (this._lang = W(e), this);
    }
};
for (o = 0; o < C.length; o++) st(C[o].toLowerCase().replace(/s$/, ""), C[o]);
st("year", "FullYear"), r.fn.days = r.fn.day, r.fn.weeks = r.fn.week, r.fn.isoWeeks = r.fn.isoWeek, r.duration.fn = B.prototype = {
    weeks: function() {
        return F(this.days() / 7);
    },
    valueOf: function() {
        return this._milliseconds + this._days * 864e5 + this._months * 2592e6;
    },
    humanize: function(e) {
        var t = +this, n = nt(t, !e, this.lang());
        return e && (n = this.lang().pastFuture(t, n)), this.lang().postformat(n);
    },
    lang: r.fn.lang
};
for (o in k) k.hasOwnProperty(o) && (ut(o, k[o]), ot(o.toLowerCase()));
ut("Weeks", 6048e5), r.lang("zh-cn", {
    months: "一月_二月_三月_四月_五月_六月_七月_八月_九月_十月_十一月_十二月".split("_"),
    monthsShort: "1月_2月_3月_4月_5月_6月_7月_8月_9月_10月_11月_12月".split("_"),
    weekdays: "星期日_星期一_星期二_星期三_星期四_星期五_星期六".split("_"),
    weekdaysShort: "周日_周一_周二_周三_周四_周五_周六".split("_"),
    weekdaysMin: "日_一_二_三_四_五_六".split("_"),
    longDateFormat: {
        LT: "Ah点mm",
    L: "YYYY年MMMD日",
    LL: "YYYY年MMMD日",
    LLL: "YYYY年MMMD日LT",
    LLLL: "YYYY年MMMD日ddddLT",
    l: "YYYY年MMMD日",
    ll: "YYYY年MMMD日",
    lll: "YYYY年MMMD日LT",
    llll: "YYYY年MMMD日ddddLT"
    },
    meridiem: function(e, t, n) {
        return e < 9 ? "早上" : e < 11 && t < 30 ? "上午" : e < 13 && t < 30 ? "中午" : e < 18 ? "下午" : "晚上";
    },
    calendar: {
        sameDay: "[今天]LT",
        nextDay: "[明天]LT",
        nextWeek: "[下]ddddLT",
        lastDay: "[昨天]LT",
        lastWeek: "[上]ddddLT",
        sameElse: "L"
    },
    ordinal: function(e, t) {
        switch (t) {
            case "d":
            case "D":
            case "DDD":
                return e + "日";
            case "M":
                return e + "月";
            case "w":
            case "W":
                return e + "周";
            default:
                return e;
        }
    },
    relativeTime: {
        future: "%s内",
        past: "%s前",
        s: "几秒",
        m: "1分钟",
        mm: "%d分钟",
        h: "1小时",
        hh: "%d小时",
        d: "1天",
        dd: "%d天",
        M: "1个月",
        MM: "%d个月",
        y: "1年",
        yy: "%d年"
    }
}), n.exports = r;
});
define("common/lib/store.js", [ "common/lib/json.js" ], function(e, t, n) {
    function f() {
        try {
            return o in window && window[o];
        } catch (e) {
            return !1;
        }
    }
    var r = e("common/lib/json.js"), i = {}, s = window.document, o = "localStorage", u = "__storejs__", a;
    i.disabled = !1, i.set = function(e, t) {}, i.get = function(e) {}, i.remove = function(e) {}, i.clear = function() {}, i.transact = function(e, t, n) {
        var r = i.get(e);
        n == null && (n = t, t = null), typeof r == "undefined" && (r = t || {}), n(r), i.set(e, r);
    }, i.getAll = function() {}, i.serialize = function(e) {
        return r.stringify2(e);
    }, i.deserialize = function(e) {
        if (typeof e != "string") return undefined;
        try {
            return r.parse(e);
        } catch (t) {
            return e || undefined;
        }
    };
    if (f()) a = window[o], i.set = function(e, t) {
        return t === undefined ? i.remove(e) : (a.setItem(e, i.serialize(t)), t);
    }, i.get = function(e) {
        return i.deserialize(a.getItem(e));
    }, i.remove = function(e) {
        a.removeItem(e);
    }, i.clear = function() {
        a.clear();
    }, i.getAll = function() {
        var e = {};
        for (var t = 0; t < a.length; ++t) {
            var n = a.key(t);
            e[n] = i.get(n);
        }
        return e;
    }; else if (s.documentElement.addBehavior) {
        var l, c;
        try {
            c = new ActiveXObject("htmlfile"), c.open(), c.write('<script>document.w=window</script><iframe src="/favicon.ico"></iframe>'), c.close(), l = c.w.frames[0].document, a = l.createElement("div");
        } catch (h) {
            a = s.createElement("div"), l = s.body;
        }
        function p(e) {
            return function() {
                var t = Array.prototype.slice.call(arguments, 0);
                t.unshift(a), l.appendChild(a), a.addBehavior("#default#userData"), a.load(o);
                var n = e.apply(i, t);
                return l.removeChild(a), n;
            };
        }
        var d = new RegExp("[!\"#$%&'()*+,/\\\\:;<=>?@[\\]^`{|}~]", "g");
        function v(e) {
            return e.replace(d, "___");
        }
        i.set = p(function(e, t, n) {
            return t = v(t), n === undefined ? i.remove(t) : (e.setAttribute(t, i.serialize(n)), e.save(o), n);
        }), i.get = p(function(e, t) {
            return t = v(t), i.deserialize(e.getAttribute(t));
        }), i.remove = p(function(e, t) {
            t = v(t), e.removeAttribute(t), e.save(o);
        }), i.clear = p(function(e) {
            var t = e.XMLDocument.documentElement.attributes;
            e.load(o);
            for (var n = 0, r; r = t[n]; n++) e.removeAttribute(r.name);
            e.save(o);
        }), i.getAll = p(function(e) {
            var t = e.XMLDocument.documentElement.attributes, n = {};
            for (var r = 0, s; s = t[r]; ++r) {
                var o = v(s.name);
                n[s.name] = i.deserialize(e.getAttribute(o));
            }
            return n;
        });
    }
    try {
        i.set(u, u), i.get(u) != u && (i.disabled = !0), i.remove(u);
    } catch (h) {
        i.disabled = !0;
    }
    i.enabled = !i.disabled, n.exports = i;
});
define("media/media_cgi.js", [ "common/wx/Tips.js", "common/wx/Cgi.js" ], function(e, t, n) {
    "use strict";
    var r = e("common/wx/Tips.js"), i = e("common/wx/Cgi.js"), s = {
        del: function(e, t) {
            i.post({
                mask: !1,
            url: wx.url("/cgi-bin/operate_appmsg?sub=del&t=ajax-response"),
            data: {
                AppMsgId: e
            },
            error: function() {
                r.err("删除失败");
            }
            }, function(e) {
                e.ret == "0" ? (r.suc("删除成功"), t && t(e)) : r.err("删除失败");
            });
        },
    save: function(e, t, n, s, o) {
        var u = t.AppMsgId ? wx.url("/cgi-bin/operate_appmsg?t=ajax-response&sub=update&type=%s".sprintf(e)) : wx.url("/cgi-bin/operate_appmsg?t=ajax-response&sub=create&type=%s".sprintf(e));
        t.ajax = 1, i.post({
            url: u,
            data: t,
            dataType: "html",
            error: function() {
                r.err("保存失败"), s && s();
            },
            complete: o
        }, function(e) {
            e = $.parseJSON(e);
            if (e.ret == "0") r.suc("保存成功"), n && n(e); else {
                switch (e.ret) {
                    case "64506":
                        r.err("保存失败,链接不合法");
                        break;
                    case "64507":
                        r.err("内容不能包含链接，请调整");
                        break;
                    case "64508":
                        r.err("查看原文链接可能具备安全风险，请检查");
                        break;
                    case "-99":
                        r.err("内容超出字数，请调整");
                        break;
                    case "-20000":
                        r.err("登录态超时，请重新登录。");
                        break;
                    default:
                        r.err("保存失败");
                }
                s && s();
            }
        });
    },
    preview: function(e, t, n, s) {
        i.post({
            url: wx.url("/cgi-bin/operate_appmsg?sub=preview&t=ajax-appmsg-preview&type=%s".sprintf(e)),
        data: t,
        dataType: "html",
        error: function() {
            r.err("发送失败，请稍后重试"), s && s();
        }
        }, function(e) {
            e = $.parseJSON(e);
            if (e.ret == "0") r.suc("发送预览成功，请留意你的手机微信"), n && n(e); else {
                switch (e.ret) {
                    case "64501":
                        r.err("你输入是非法的微信号，请重新输入");
                        break;
                    case "64502":
                        r.err("你输入的微信号不存在，请重新输入");
                        break;
                    case "10700":
                    case "64503":
                        r.err("你输入的微信号不是你的好友");
                        break;
                    case "10703":
                        r.err("对方关闭了接收消息");
                        break;
                    case "10701":
                        r.err("用户已被加入黑名单，无法向其发送消息");
                        break;
                    case "10704":
                    case "10705":
                        r.err("该素材已被删除");
                        break;
                    case "64504":
                        r.err("保存图文消息发送错误，请稍后再试");
                        break;
                    case "64505":
                        r.err("发送预览失败，请稍后再试");
                        break;
                    case "64507":
                        r.err("内容不能包含链接，请调整");
                        break;
                    case "-99":
                        r.err("内容超出字数，请调整");
                        break;
                    case "62752":
                        r.err("可能含有具备安全风险的链接，请检查");
                        break;
                    case "-8":
                    case "-6":
                        e.ret = "-6", r.err("请输入验证码");
                        break;
                    default:
                        r.err("系统繁忙，请稍后重试");
                }
                s && s(e);
            }
        });
    },
    getList: function(e, t, n, s) {
        i.get({
            mask: !1,
        url: wx.url("/cgi-bin/appmsg?type=%s&action=list&begin=%s&count=%s&f=json".sprintf(e, t, n)),
        error: function() {
            r.err("获取列表失败");
        }
        }, function(e) {
            e && e.base_resp && e.base_resp.ret == 0 ? s && s(e.app_msg_info) : r.err("获取列表失败");
        });
    }
    };
    return {
        rename: function(e, t, n) {
            i.post({
                mask: !1,
                url: wx.url("/cgi-bin/modifyfile?oper=rename&t=ajax-response"),
                data: {
                    fileid: e,
                fileName: t
                },
                error: function() {
                    r.err("重命名失败");
                }
            }, function(e) {
                if (e.ret == "0") r.suc("重命名成功"), n && n(e); else switch (e.ret) {
                    case "-2":
                        r.err("素材名不能包含空格");
                        break;
                    default:
                        r.err("重命名失败");
                }
            });
        },
            del: function(e, t) {
                i.post({
                    mask: !1,
                url: wx.url("/cgi-bin/modifyfile?oper=del&t=ajax-response"),
                data: {
                    fileid: e
                },
                error: function() {
                    r.err("删除失败");
                }
                }, function(e) {
                    e.ret == "0" ? (r.suc("删除成功"), t && t(e)) : r.err("删除失败");
                });
            },
            getList: function(e, t, n, s) {
                i.get({
                    mask: !1,
                url: wx.url("/cgi-bin/filepage?type=%s&begin=%s&count=%s&f=json".sprintf(e, t, n)),
                error: function() {
                    r.err("获取列表失败");
                }
                }, function(e) {
                    e && e.base_resp && e.base_resp.ret == 0 ? s && s(e.page_info) : r.err("获取列表失败");
                });
            },
            appmsg: s
    };
});
define("common/wx/time.js", [], function(e, t, n) {
    "use strict";
    function s(e) {
        var t = new Date(e * 1e3), n = new Date, s = t.getTime(), o = n.getTime(), u = 864e5;
        return o - s < u && n.getDate() == t.getDate() ? "%s:%s".sprintf(r(t.getHours()), r(t.getMinutes())) : o - s < 2 * u && (new Date(t * 1 + u)).getDate() == n.getDate() ? "昨天 %s:%s".sprintf(r(t.getHours()), r(t.getMinutes())) : o - s <= 6 * u ? "星期%s %s:%s".sprintf(i[t.getDay()], r(t.getHours()), r(t.getMinutes())) : t.getFullYear() == n.getFullYear() ? "%s月%s日".sprintf(r(t.getMonth() + 1), r(t.getDate())) : "%s年%s月%s日".sprintf(t.getFullYear(), r(t.getMonth() + 1), r(t.getDate()));
    }
    function o(e) {
        var t = new Date(e * 1e3);
        return "%s-%s-%s %s:%s:%s".sprintf(t.getFullYear(), r(t.getMonth() + 1), r(t.getDate()), r(t.getHours()), r(t.getMinutes()), r(t.getSeconds()));
    }
    var r = function(e) {
        return e += "", e.length >= 2 ? e : "0" + e;
    }, i = [ "日", "一", "二", "三", "四", "五", "六" ];
    return {
        timeFormat: s,
    getFullTime: o
    };
});
define("media/appmsg_edit.js", [ "xss/ui/media/appmsg_editor.css", "common/wx/popup.js", "common/wx/time.js", "common/qq/Class.js", "media/media_cgi.js", "common/lib/store.js", "common/wx/Tips.js", "common/lib/moment.js", "common/wx/upload.js", "common/lib/jquery.validate.js", "common/wx/top.js", "tpl/simplePopup.html.js", "tpl/media/appmsg_edit/first_appmsg.html.js", "tpl/media/appmsg_edit/small_appmsg.html.js", "tpl/media/appmsg_edit/editor.html.js", "common/qq/mask.js", "common/wx/verifycode.js" ], function(e, t, n) {
    "use strict";
    function r(e) {
        var t = e && e.multi_item;
        if (!t) return !1;
        t[0].create_time = l.getFullTime(e.create_time) || v().format("YYYY-MM-DD HH:mm:ss");
        for (var n = 0; n < t.length; ++n) for (var r in t[n]) t[n][r].html && (t[n][r] = t[n][r].html(!1));
        return t ? t : !1;
    }
    e("xss/ui/media/appmsg_editor.css"), e("common/wx/popup.js");
    var i = wx.T, s = wx.cgiData, o = s.type, u = s.app_id, a = s.appmsg_data, f = template.render, l = e("common/wx/time.js"), c = e("common/qq/Class.js"), h = e("media/media_cgi.js"), p = e("common/lib/store.js"), d = e("common/wx/Tips.js"), v = e("common/lib/moment.js"), m = e("common/wx/upload.js"), g = m.uploadBizFile, y = e("common/lib/jquery.validate.js"), b = y.rules, w = e("common/wx/top.js"), E = e("tpl/simplePopup.html.js"), S = e("tpl/media/appmsg_edit/first_appmsg.html.js"), x = e("tpl/media/appmsg_edit/small_appmsg.html.js"), T = e("tpl/media/appmsg_edit/editor.html.js");
    (new w("#topTab", w.DATA.media)).selected("media" + o);
    var N = "#appmsgItem", C = ".js_appmsg_item", k = "appmsg", L = {
        maxNum: 8
    }, A = c.declare({
        init: function(e, t, n) {
            var r = this;
            if (!r._supportUserData() && typeof localStorage == "undefined") return !1;
            r.isMul = e, r.app_id = t, r.draftId = wx.data.uin + (t ? t : "") + (e ? "m" : "") + n, r.timeKey = "Time" + r.draftId, r.appKey = "App" + r.draftId, r.isDropped = !1, !p.get(r.timeKey) || (r._showTips("已载入" + r._getSaveTime() + "的草稿"), $("#js_cancle").show());
        },
    _supportUserData: function() {
        try {
            var e = document.createElement("input");
            e.addBehavior("#default#userData");
        } catch (t) {
            return !1;
        }
        return !0;
    },
    _getSaveTime: function() {
        return p.get(this.timeKey);
    },
    _showTips: function(e) {
        $("#js_auto_tips").html(e).show();
    },
    clear: function() {
        p.remove(this.timeKey), p.remove(this.appKey);
    },
    save: function(e) {
        var t = this;
        t.clear(), p.set(t.timeKey, v().format("YYYY/MM/DD HH:mm:ss")), p.set(t.appKey, e), t._showTips("自动保存：" + p.get(t.timeKey)), $("#js_cancle").hide();
    },
    get: function() {
        var e = p.get(this.appKey);
        return e ? e : !1;
    }
    }), O = c.declare({
        init: function(e) {
            var t = this;
            t.gid = 1, $.extend(!0, t, L, e), t.maxNum = t.isMul ? t.maxNum : 1, t.editor$ = $(t.editor_selector).html(i(T, {
                isMul: t.isMul,
                type: o
            })), t._initEditor(), t.appmsg$ = $(t.appmsg_selector), t.nowitem$ = null, t.uploadImgItem$ = null, t.isNew = !0, t.isFirst = !0, t.list = r(t.appmsg_data), window.Draft = t.draft = new A(t.isMul, t.app_id, o);
            if (o == 10) {
                var n = t.get_draft();
                !n || (t.list = n);
            }
            if (!t.list) t.add(), t.isMul && t.add(); else {
                var s = t.list;
                for (var u = 0; u < s.length; ++u) t.add(s[u]);
            }
            t._refreshUI(0), t.appmsg$.on("click", ".js_edit", function() {
                var e = $(this), n = e.data("id");
                t._refreshUI($(N + n));
            }), t.appmsg$.on("click", ".js_del", function() {
                var e = $(this), n = e.data("id");
                t.remove($(N + n));
            }), t.isMul ? $("#js_add_appmsg").click(function() {
                t.add();
            }) : $("#js_add_appmsg").addClass("dn"), o == 10 && (setInterval(function() {
                t.auto_save();
            }, 12e4), window.onbeforeunload = function() {
                var e = !0, n = t._getEditData();
                for (var r in n) if (!!n[r]) {
                    e = !1;
                    break;
                }
                if (!e && !t.draft.isDropped) {
                    t.auto_save();
                    var i = p.get(t.draft.timeKey);
                    return "已自动保存" + i + "时的内容。";
                }
                t.draft.clear();
            });
        },
        _initEditor: function() {
            var e = this, t = e.editor$;
            $(".js_title", t).keyup(function() {
                var t = $(this).val().trim().html(!0);
                e.nowitem$ && e.nowitem$.find(".appmsg_title a").html(t);
            }), $(".js_desc", t).keyup(function() {
                var t = $(this).val().trim().html(!0);
                e.nowitem$ && e.nowitem$.find(".appmsg_desc").html(t);
            }), $(".js_addURL", t).click(function() {
                $(this).hide(), $(".js_url_area", t).show();
            }), e.isMul ? ($(".js_addDesc", t).hide(), $(".js_desc_area", t).hide()) : $(".js_addDesc", t).show().click(function() {
                $(this).hide(), $(".js_desc_area", t).show();
            }), $(".js_removeCover", t).click(function() {
                $(".js_cover", t).data("file_id", !1).hide().find("img").remove(), e.nowitem$ && e.nowitem$.removeClass("has_thumb");
            }), g({
                multi: !1,
                container: "#js_appmsg_upload_cover",
                onSelect: function() {
                    e.uploadImgItem$ = e.nowitem$;
                },
                onComplete: function(n, r, i, s, o) {
                    var u = s.content, a = wx.url("/cgi-bin/getimgdata?mode=large&source=file&fileId=%s".sprintf(u));
                    $(".js_cover", t).find("img").remove(), $(".js_cover", t).show().prepend('<img src="%s">'.sprintf(a)).data("file_id", u), !e.nowitem$ || (e.nowitem$.find("img.js_appmsg_thumb").attr("src", a), e.nowitem$.addClass("has_thumb"));
                }
            }), document.domain = "qq.com";
            if (o == 10) {
                var n = new baidu.editor.ui.Editor({
                    wordCount: !1,
                    elementPathEnabled: !1,
                    customDomain: !0
                });
                n.render("js_editor"), e.ueditor = n;
            }
        },
        _getItem$: function(e) {
            var t = this, n = null;
            return $.isNumeric(e) ? n = t.appmsg$.find(C).eq(e) : n = $(e), n;
        },
        _getNextItem$: function(e) {
            var t = this, n = t.appmsg$.find(C), r = n.length;
            for (var i = 0; i < r; ++i) if (n.eq(i).data("id") == e.data("id")) break;
            return i < r ? (i = (i + 1) % r, n.eq(i)) : null;
        },
        _getItemIdx: function(e) {
            var t = this, n = t.appmsg$.find(C), r = n.length;
            for (var i = 0; i < r; ++i) if (n.eq(i).data("id") == e.data("id")) return i;
            return -1;
        },
        _getEditData: function() {
            var e = this.editor$, t = {};
            return t.title = $(".js_title", e).val().trim(), t.author = $(".js_author", e).val().trim(), t.file_id = $(".js_cover", e).data("file_id"), o == 10 ? t.source_url = $(".js_url", e).val().trim() : t.content_url = $(".js_url", e).val().trim(), t.digest = $(".js_desc", e).val().trim(), o == 10 && (t.content = this.ueditor.getContent(), t.digest = t.digest || t.content.text().html(!1).substr(0, 54)), t;
        },
        _fillEditArea: function(e) {
            var t = this, n = t.editor$;
            n.find(".js_cover_tip").html(e.isFirst ? "大图片建议尺寸：360像素 * 200像素" : "小图片建议尺寸：200像素 * 200像素"), $(".js_title", n).val(e.title), $(".js_author", n).val(e.author), $(".js_cover", n).find("img").remove();
            if (!e.file_id) $(".js_cover", n).data("file_id", !1).hide(); else {
                var r = wx.url("/cgi-bin/getimgdata?mode=large&source=file&fileId=%s>".sprintf(e.file_id));
                $(".js_cover", n).show().prepend('<img src="%s">'.sprintf(r)).data("file_id", e.file_id);
            }
            $(".js_desc", n).val(e.digest), !t.isMul && o == 10 && (e.digest ? ($(".js_addDesc", n).hide(), $(".js_desc_area", n).show()) : ($(".js_addDesc", n).show(), $(".js_desc_area", n).hide())), o == 10 ? $(".js_url", n).val(e.source_url || "") : $(".js_url", n).val(e.content_url || ""), !e.source_url && o == 10 ? ($(".js_addURL", n).show(), $(".js_url_area", n).hide()) : ($(".js_addURL", n).hide(), $(".js_url_area", n).show()), o == 10 && t._setEditorContent(e.content);
        },
        _setEditorContent: function(t) {
            var n = this;
            n.ueditor.ready(function() {
                n.ueditor.setContent(t || "");
                if (!n.initZoomArea) {
                    var r = '<a id="%s" href="javascript:void(0);" onclick="return false;" class="%s">%s</a>';
                    $("#js_editor .edui-toolbar").append(r.sprintf("js_zoomout", "zoomout_edit_tips", "放大编辑") + r.sprintf("js_zoomin", "zoomin_edit_tips", "缩小编辑"));
                    var i = e("common/qq/mask.js"), s = $("#js_ueditor"), o = i.show({
                        parent: $("#js_appmsg_editor .appmsg_editor"),
                        spin: !1
                    });
                    o.hide(), $("#js_zoomout").click(function() {
                        s.addClass("zoom_edit").css({
                            marginTop: -(s.outerHeight() / 2),
                            marginLeft: -(s.outerWidth() / 2)
                        }), o.show();
                    });
                    var u = function() {
                        s.removeClass("zoom_edit").css({
                            marginTop: 0,
                            marginLeft: 0
                        }), o.hide();
                    };
                    $("#js_zoomin").click(function() {
                        u();
                    }), $("#js_finish_zoom,.jsClose").click(function() {
                        u();
                    }), n.initZoomArea = !0;
                }
            });
        },
        _flush: function() {
            var e = this;
            !e.nowitem$ || e._setData(e.nowitem$, e._getEditData());
        },
        _refreshUI: function(e) {
            var t = this, n = t._getItem$(e), r = t._getData(n);
            if (!!t.nowitem$ && n.data("id") == t.nowitem$.data("id")) return;
            t._flush(), t.nowitem$ = n, function() {
                e = t._getItemIdx(n);
                var r = n.offset(), i = t.editor$.offset(), s = o == 10 ? 580 : 390, u = n.outerHeight(), a = t.appmsg$.offset(), f = r.top - a.top;
                e >= t.maxNum / 2 ? (t.editor$.find(".arrow").css({
                    marginTop: s - u
                }), t.editor$.find(".appmsg_editor").css({
                    marginTop: f + u - s
                })) : (t.editor$.find(".arrow").css({
                    marginTop: 0
                }), t.editor$.find(".appmsg_editor").css({
                    marginTop: e == 0 ? 0 : f
                }));
            }(), t._fillEditArea(r);
        },
        _setData: function(e, t) {
            var n = this, r = n._getItem$(e);
            return r.data(k, t);
        },
        _getData: function(e) {
            var t = this, n = t._getItem$(e);
            return n.data(k);
        },
        _getDatalist: function() {
            this._flush();
            var e = this, t = [], n = e.appmsg$.find(C);
            for (var r = 0; r < n.length; ++r) t.push(e._getData(n[r]));
            return t;
        },
        _validate: function(e) {
            return e.title == "" ? !1 : e.content == "" ? !1 : e.app_id == "" ? !1 : !0;
        },
        _validateList: function(e) {
            var t = this;
            for (var n = 0; n < e.length; ++n) if (!t._validate(e[n])) return _refreshUI(n), !1;
            return !0;
        },
        _initData: function(e) {
            return !e.file_id || (e.cover = wx.url("/cgi-bin/getimgdata?mode=large&source=file&fileId=%s".sprintf(e.file_id))), $.extend({
                author: "",
            file_id: "",
            content: "",
            content_url: "",
            source_url: "",
            digest: "",
            title: ""
            }, e);
        },
        add: function(e) {
            var t = this, n = t._getDatalist().length, r = t.maxNum;
            if (t._getDatalist().length >= r) {
                d.err("你最多只可以加入%s条图文消息".sprintf(r));
                return;
            }
            var e = t._initData(e || {});
            e.id = t.gid++, e.isMul = t.isMul, e.isFirst = t.isFirst;
            var s = t.isFirst ? S : x, o = $(i(s, e).trim()).appendTo(t.appmsg$);
            t._setData(o, e), t.isFirst = !1;
        },
        remove: function(e) {
            var t = this, n = t._getDatalist().length;
            if (t.isMul && n <= 2) {
                d.err("无法删除，多条图文至少需要%s条消息。".sprintf(2));
                return;
            }
            var r = t._getItem$(e), i = t._getNextItem$(r);
            r.remove(), !i || t._refreshUI(i);
        },
        preview: function() {
            var e = this, t = e._getDatalist();
            if (!e._validateList(t)) return !1;
            appmsgCgi.preview(t, fakeID, function() {});
        },
        auto_save: function() {
            var e = this._getDatalist();
            return this.draft.save(e);
        },
        get_draft: function() {
            return this.draft.get();
        },
        _getItemDataAndValid: function(e, t) {
            var n = this, r = {};
            r["title" + t] = e.title, r["content" + t] = e.content, r["digest" + t] = e.digest, r["author" + t] = e.author, r["fileid" + t] = e.file_id;
            var i = /:\/\//, s = o == 10 ? e.source_url : e.content_url;
            !!s && !i.test(s) && (s = "http://" + s), o == 11 ? r["contenturl" + t] = s : r["sourceurl" + t] = s;
            if (!b.rangelength(e.title, [ 1, 64 ])) return d.err("标题不能为空且长度不能超过%s字".sprintf(64)), $(".js_title", this.editor$).focus(), null;
            if (!b.maxlength(e.author, 8)) return d.err("作者不能超过%s个字".sprintf(8)), $(".js_author", this.editor$).focus(), null;
            if (!e.file_id) if (o == 11 || wx.data.uin != "1675779340" && wx.data.uin != "3080043700") return d.err("必须插入一张图片"), null;
            return o == 10 && !b.rangelength(e.content.text(), [ 1, 2e4 ]) ? (d.err("正文不能为空且长度不能超过%s字".sprintf(2e4)), null) : !n.isMul && !b.rangelength(e.digest, [ 1, 120 ]) ? (d.err("%s不能为空且长度不能超过%s字".sprintf(o == 10 ? "摘要" : "描述", 120)), $(".js_desc", this.editor$).focus(), null) : o != 11 && !s || !!b.url(s) ? o == 10 && !e.content.split("<iframe ").length > 2 ? (d.err("正文只能包含%s个视频".sprintf(1)), null) : r : (d.err("链接不合法"), $(".js_url", this.editor$).focus(), null);
        },
        getData: function() {
            var e = this, t = {}, n = e._getDatalist();
            t.AppMsgId = e.app_id, t.count = n.length;
            for (var r = 0; r < n.length; ++r) {
                var i = n[r];
                i = e._getItemDataAndValid(i, r);
                if (!i) return e._refreshUI(r), null;
                $.extend(t, i);
            }
            return t;
        }
    });
    O.formatData = r, function() {
        var t = "#js_appmsg_editor", n = "#js_appmsg_preview", r = new O({
            app_id: u,
            editor_selector: t,
            appmsg_selector: n,
            isMul: !!s.isMul,
            appmsg_data: a
        });
        $("#js_cancle").click(function() {
            return Draft.clear(), Draft.isDropped = !0, window.location.reload(), !1;
        }), $("#js_submit").click(function() {
            var e = r.getData();
            if (!e) return;
            $("#js_submit").btn(!1), h.appmsg.save(o, e, function(e) {
                Draft.clear(), Draft.isDropped = !0, location.href = wx.url("/cgi-bin/appmsg?begin=0&count=10&t=media/appmsg_list&type=%s&action=list".sprintf(o));
            }, function() {
                $("#js_submit").btn(!0);
            });
        });
        var i = p.get("appMsgPreviewName"), f = null, l = null, c = e("common/wx/verifycode.js");
        $("#js_preview").click(function() {
            var e = r.getData();
            if (!e) return;
            var t = $(template.compile(E)({
                label: "请输入微信号，此图文消息将发送至该微信号预览。",
                value: i
            })).popup({
                title: "发送预览",
            className: "simple",
            onOK: function() {
                var t = this, n = t.get(), i = n.find(".frm_input"), s = i.val().trim();
                e.preusername = s, p.set("appMsgPreviewName", s || "");
                if (!b.rangelength(s, [ 1, 20 ])) return d.err("微信号必须为1到20个字符"), i.focus(), !0;
                if (f != null && f.getCode().trim().length <= 0) return d.err("请输入验证码"), f.focus(), !0;
                var u = n.find(".btn_primary .js_btn").btn(!1);
                return e.imgcode = f && f.getCode().trim(), h.appmsg.preview(o, e, function(e) {
                    r.app_id = e.appMsgId, u.btn(!0), t.hide();
                }, function(e) {
                    u.btn(!0), i.focus(), e && e.ret == "-6" && (l = n.find(".js_verifycode"), f = l.html("").removeClass("dn").verifycode().data("verifycode"), f.focus());
                }), !0;
            }
            });
            $(".frm_input", t).focus();
        });
    }();
});
