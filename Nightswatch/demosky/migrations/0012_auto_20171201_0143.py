# -*- coding: utf-8 -*-
# Generated by Django 1.11.5 on 2017-12-01 01:43
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('demosky', '0011_userprofile_token_valid'),
    ]

    operations = [
        migrations.CreateModel(
            name='topics',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('topic', models.CharField(max_length=100)),
            ],
        ),
        migrations.AddField(
            model_name='chat',
            name='topic',
            field=models.CharField(default=0, max_length=100),
            preserve_default=False,
        ),
    ]
