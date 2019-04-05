FROM pw2019:0.0.1

EXPOSE 80
WORKDIR /opt/lampp
ENTRYPOINT ./lampp start && tail -f /opt/lampp/logs/access_log
