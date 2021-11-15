run muna sa terminal yung `ipconfig` tas kunin yung IPv4 address
then punta ka sa `app/src/main/java/com/example/opmsqrscanner/OPMSService.java`
baguhin yung `.baseUrl("http://192.168.0.107/payroll/)` palitan yung IPv4 address sa lumabas sa `ipconfig`.

kapag naka deploy na yan dapat `https` na pero wag na muna yon kasi pati IPv4 mababago.
