FROM xampp

VOLUME ./php /opt/lampp/htdocs
EXPOSE 80
RUN ["/opt/lampp/lampp", "start"]
CMD ["/bin/bash"] 
