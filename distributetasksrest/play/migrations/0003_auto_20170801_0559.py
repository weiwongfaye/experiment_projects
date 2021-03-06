# -*- coding: utf-8 -*-
# Generated by Django 1.11.3 on 2017-08-01 05:59
from __future__ import unicode_literals

from django.db import migrations, models
import django.db.models.deletion
import uuid


class Migration(migrations.Migration):

    dependencies = [
        ('play', '0002_auto_20170801_0543'),
    ]

    operations = [
        migrations.CreateModel(
            name='Channel',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('channelName', models.CharField(max_length=50)),
                ('channelStatus', models.CharField(max_length=50)),
            ],
        ),
        migrations.CreateModel(
            name='Task',
            fields=[
                ('id', models.UUIDField(default=uuid.uuid4, editable=False, primary_key=True, serialize=False)),
                ('testName', models.CharField(max_length=50)),
                ('testPath', models.CharField(max_length=50)),
                ('testPlatform', models.CharField(max_length=50)),
                ('testRun', models.CharField(max_length=50)),
                ('testChannel', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='play.Channel')),
            ],
        ),
        migrations.DeleteModel(
            name='MyUUIDModel',
        ),
    ]
