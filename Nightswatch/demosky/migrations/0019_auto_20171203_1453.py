# -*- coding: utf-8 -*-
# Generated by Django 1.11.5 on 2017-12-03 19:53
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('demosky', '0018_auto_20171203_1448'),
    ]

    operations = [
        migrations.AlterField(
            model_name='topics',
            name='topic',
            field=models.CharField(max_length=100),
        ),
    ]