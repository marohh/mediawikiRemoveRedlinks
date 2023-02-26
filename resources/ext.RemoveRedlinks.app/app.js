if (mw.config.values.wgUserName !== null) {
  $("a[data-redlink-url]")
    .toArray()
    .forEach(function (element) {
      console.log(element);
      element.href = atob(element.attributes["data-redlink-url"].value);
      element.attributes.removeNamedItem("data-redlink-url");
      element.attributes.removeNamedItem("style");
      element.className = "new";
      const titleAttribute = document.createAttribute("title");
      titleAttribute.value = atob(
        element.attributes["data-redlink-title"].value
      );
      element.attributes.setNamedItem(titleAttribute);
      element.attributes.removeNamedItem("data-redlink-title");
    });
}
