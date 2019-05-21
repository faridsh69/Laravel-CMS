---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://eric.com/_html/vendor/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_229c53f9bf8d480e3d4f1e7117c1eac7 -->
## api/general/countries
> Example request:

```bash
curl -X GET -G "http://eric.com/api/general/countries" 
```
```javascript
const url = new URL("http://eric.com/api/general/countries");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "data": [
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        },
        {
            "common": "Aruba",
            "native": {
                "nld": {
                    "common": "Aruba",
                    "official": "Aruba"
                },
                "pap": {
                    "common": "Aruba",
                    "official": "Aruba"
                }
            },
            "official": "Aruba",
            "hydrated": {
                "flag": true
            },
            "flag": {
                "sprite": "<span class=\"flag flag-\"><\/span>",
                "flag-icon": "<span class=\"flag-icon flag-icon-\"><\/span>",
                "flag-icon-squared": "<span class=\"flag-icon flag-icon- flag-icon-squared\"><\/span>",
                "world-flags-sprite": "<span class=\"flag \"><\/span>",
                "svg": null,
                "svg_path": "C:\\xampp\\htdocs\\cms-new\\vendor\\pragmarx\\countries\\src\\data\\flags\\.svg"
            }
        }
    ]
}
```

### HTTP Request
`GET api/general/countries`


<!-- END_229c53f9bf8d480e3d4f1e7117c1eac7 -->


