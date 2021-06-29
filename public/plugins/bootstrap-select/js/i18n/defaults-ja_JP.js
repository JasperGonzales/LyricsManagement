/*!
 * Bootstrap-select v1.13.9 (https://developer.snapappointments.com/bootstrap-select)
 *
 * Copyright 2012-2019 SnapAppointments, LLC
 * Licensed under MIT (https://github.com/snapappointments/bootstrap-select/blob/master/LICENSE)
 */

(function (root, factory) {
  if (root === undefined && window !== undefined) root = window;
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module unless amdModuleId is set
    define(["jquery"], function (a0) {
      return (factory(a0));
    });
  } else if (typeof module === 'object' && module.exports) {
    // Node. Does not work with strict CommonJS, but
    // only CommonJS-like environments that support module.exports,
    // like Node.
    module.exports = factory(require("jquery"));
  } else {
    factory(root["jQuery"]);
  }
}(this, function (jQuery) {

(function ($) {
  $.fn.selectpicker.defaults = {
    noneSelectedText: '複数選択可能',
    noneResultsText: '\'{0}\'が結果を返さない',
    countSelectedText: '選択してください',
    maxOptionsText: ['限界は達した({n}{var}最大)', '限界をグループは達した({n}{var}最大)', ['アイテム', 'アイテム']],
    selectAllText: '全部を選択する',
    deselectAllText: '複数選択可能',
    multipleSeparator: ', '
  };
})(jQuery);


}));
//# sourceMappingURL=defaults-ja_JP.js.map